<?php

namespace App\Http\Controllers;

use App\Models\BuySession;
use App\Models\Exercice;
use App\Models\Sesin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

use function Pest\Laravel\get;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sessions = Sesin::where('approve', true)->get();
        $user = Auth::user();
        $payedSessions = $user->sessions()->wherePivot('pay', true)->select('sesins.id')->pluck('id')->toArray();

        return view('trainer.session', compact('sessions', 'payedSessions'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = Sesin::all();

        $events = $events->map(function ($e) {
            return [
                "start" => $e->start_time,
                "end" => $e->end_time,
                "color" => "#40f9ff",
                "passed" => false,
                "title" => $e->name,
            ];
        });

        return response()->json([
            "events" => $events
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'required',
            'user_id' => 'required',
        ]);


        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);


        if ($startTime->isPast() && $endTime->isPast()) {
            return back()->with('error', 'You could travel to the past, be my guest :)');
        }

        $existingSession = Sesin::where(function ($query) use ($startTime, $endTime) {
            $query->whereBetween('start_time', [$startTime, $endTime])
                ->orWhereBetween('end_time', [$startTime, $endTime])
                ->orWhere(function ($query) use ($startTime, $endTime) {
                    $query->where('start_time', '<', $startTime)
                        ->where('end_time', '>', $endTime);
                });
        })->exists();


        if ($existingSession) {
            return back()->with('error', 'The selected time range is already booked.');
        }


        $image = $request->image;
        $imageName = hash('sha256', file_get_contents($image)) . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public/images'), $imageName);


        Sesin::create([
            'name' => $request->name,
            'start_time' => $request->start_time . ":00",
            'end_time' => $request->end_time . ":00",
            'image' => $imageName,
            'pay' => false,
            'user_id' => $request->user_id,
            'premium' => $request->premium == "on" ? true : false,
            'approve' => false,
        ]);

        return back()->with('success', 'Session created successfully!');
    }


    public function checkout(Request $request, Sesin $session)
    {
        $user = Auth::user();


        //    
        $user->sessions()->attach($request->sesin_id, ['pay' => false]);
        // dd($request->sesin_id);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));


        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => 'Buy Session'],
                        'unit_amount' => 1500,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('session.paymentSuccess', ['sesin_id' => $request->sesin_id]),
            'cancel_url' => route('dashboard'),
        ]);

        // Redirect the user to the Stripe Checkout page
        return redirect()->away($checkoutSession->url);
    }


    public function paymentSuccess(Request $request)
    {
        $user = Auth::user();
        $sesin_id = $request->sesin_id;


        $trainerRequest = $user->sessions()->wherePivot('sesin_id', $sesin_id)->first();

        if ($trainerRequest) {

            $user->sessions()->updateExistingPivot($sesin_id, ['pay' => true]);

            return redirect()->route('session.index')->with('success', 'Get Stronger With Our Sessions.');
        }

        return redirect()->route('dashboard')->with('error', 'Something went wrong, try again.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Sesin $session)
    {
        //
        $user = Auth::user();
        $exercices = Exercice::where('sesin_id', $session->id)->get();
        $owner = Sesin::where('user_id', $user->id)->get();
        // $owner = Sesin::where('user_id', $user->id)->where('sesin_id', $session->id)->get();
        // dd($test);
        return view('trainer.partials.exerciceShow', compact('session', 'exercices', 'session'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sesin $session)
    {
        //
        return view('editsession', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesin $session)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'start_time' => 'required|date',
        'end_time' => 'required|date',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $imageName = $session->image; // Keep the current image by default

    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = hash('sha256', file_get_contents($image)) . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public/images'), $imageName);
    }

    $session->update([
        'name' => $request->name,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'image' => $imageName,
    ]);

    return redirect()->back()->with('success', 'Session updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesin $session)
    {
        //
        $session->delete();
        return back();
    }
    public function joinSession(Request $request, Sesin $session)
    {

        $user = $request->user();


        if ($user->exerciceSesins->contains($session->id)) {
            return redirect()->back()->with('error', 'You are already part of this session.');
        }


        $user->exerciceSesins()->attach($session->id);

        return redirect()->back()->with('success', 'You have successfully joined the session!');
    }
}
