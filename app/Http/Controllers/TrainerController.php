<?php

namespace App\Http\Controllers;

use App\Models\Sesin;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $trainers = User::where('role', 'trainer')->get();
       
       

        return view('trainers', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
                            "name" => "Trainer Transaction",
                            "description" => "Paying to be a Trainer"
                        ],
                        'unit_amount'  => 120 * 10,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',
            
            'success_url' => route('trainer.success'),
            'cancel_url'  => route('dashboard'),
        ]);

        return redirect()->away($session->url);
    }
    public function paymentSuccess()
    {
        
        $user = Auth::user();


        $trainerRequest = Trainer::where('user_id', $user->id)->first();
       
        if ($trainerRequest) {
            $trainerRequest->update(['payment' => true]);

            return redirect()->route('dashboard')->with('success', 'Payment successful, your trainer request is now active.');
        }
        
        return redirect()->route('dashboard')->with('error', 'No trainer request found for this user.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $user = auth()->user();
        // dd($user->approve);
        request()->validate([
            'why' => 'required',
            'experience' => 'required',
            'urself' => 'required',
            'user_id' => 'required',

        ]);
        Trainer::create([
            'why' => $request->why,
            'experience' => $request->experience,
            'urself' => $request->urself,
            'user_id' => $request->user_id,

            'payment' => false,
        ]);
        Auth::user()->update(['approve' => true]);
        return  back()->with('success', 'request been send , we will inform you to pay if you been accepted by our admins');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{

    $trainer = User::where('id', $id)->where('role', 'trainer')->first();
   

    $thetrainerSessions = Sesin::where('user_id', $trainer->id)->get();


    return view('trainer.trainerShow', compact('trainer', 'thetrainerSessions'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
