<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\Sesin;
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
        $sessions = Sesin::all();
        return view('trainer.session', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        request()->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'image' => 'required',
            'user_id' => 'required',

        ]);

        $image = $request->image;
        $imageName = hash('sha256', file_get_contents($image)) . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public/images'), $imageName);

        Sesin::create([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'image' => $imageName,
            'pay' => false,
            'user_id' => $request->user_id,
            'premium' => $request->premium == "on" ? true : false
        ]);

        return back();
    }
    public function checkout()
    {
        //

        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            "name" => "Buy Section",

                        ],
                        'unit_amount'  => 15 * 10,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',

            'success_url' => route('session.paymentSuccess'),
            'cancel_url'  => route('dashboard'),
        ]);

        return redirect()->away($session->url);
    }
    public function paymentSuccess(Request $request)
{
    $sessionId = $request->session_id; 
    
    $user = Auth::user();

    
    $trainerRequest = Sesin::where('id', $sessionId)->first();

   

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
        $exercices = Exercice::where('sesin_id', $session->id)->get();
        return view('trainer.partials.exerciceShow', compact('session', 'exercices'));
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
