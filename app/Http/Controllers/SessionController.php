<?php

namespace App\Http\Controllers;

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
        //

        $sessions = Sesin::where('approve',true)->get();
        return view('trainer.session', compact('sessions'));
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

    // Parse the start and end times
    $startTime = Carbon::parse($request->start_time);
    $endTime = Carbon::parse($request->end_time);

    // Check if the start and end times are in the past
    if ($startTime->isPast() && $endTime->isPast()) {
        return back()->with('error', 'You could travel to the past, be my guest :)');
    }

    // Check for overlapping sessions
    $existingSession = Sesin::where(function ($query) use ($startTime, $endTime) {
        $query->whereBetween('start_time', [$startTime, $endTime])
              ->orWhereBetween('end_time', [$startTime, $endTime])
              ->orWhere(function ($query) use ($startTime, $endTime) {
                  $query->where('start_time', '<', $startTime)
                        ->where('end_time', '>', $endTime);
              });
    })->exists();

    // If there is an overlap, return with an error
    if ($existingSession) {
        return back()->with('error', 'The selected time range is already booked.');
    }

    // Handle the image upload
    $image = $request->image;
    $imageName = hash('sha256', file_get_contents($image)) . '.' . $image->getClientOriginalExtension();
    $image->move(storage_path('app/public/images'), $imageName);

    // Store the session
    Sesin::create([
        'name' => $request->name,
        'start_time' => $request->start_time . ":00",
        'end_time' => $request->end_time . ":00",
        'image' => $imageName,
        'pay' => false,
        'user_id' => $request->user_id,
        'premium' => $request->premium == "on" ? true : false,
        'approve' =>false,
    ]);

    return back()->with('success', 'Session created successfully!');
}

    
    public function checkout(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Assuming you have the session ID from the request
        $sessionId = $request->sesin_id;
        $userId = $request->user_id;

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => 'Buy Section'],
                        'unit_amount' => 1500,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('session.paymentSuccess', ['session_id' => $sessionId, 'user_id' => $userId]),
            'cancel_url' => route('dashboard'),
        ]);

        return redirect()->away($session->url);
    }
    public function paymentSuccess(Request $request)
    {
        $user = Auth::user();


        $sessionId = $request->query('session_id');
        $userId = $request->query('user_id');




        $trainerRequest = Sesin::where('user_id', $userId)->where('id', $sessionId)->first();

        if ($trainerRequest) {
            $trainerRequest->update(['pay' => true]);

            return redirect()->route('dashboard')->with('success', 'Get Stronger With Our Sessions.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesin $session)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesin $session)
    {
        //
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
