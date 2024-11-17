<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $trainers = User::where('role' ,'trainer')->get();
       
        return view('trainers',compact('trainers'));
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
            'why'=>'required',
            'experience'=>'required',
            'urself'=>'required',
            'user_id'=>'required',
           
        ]);
        Trainer::create([
            'why'=>$request->why,
            'experience'=>$request->experience,
            'urself'=>$request->urself,
            'user_id'=>$request->user_id,
            
            'payment'=>false,
        ]);
        Auth::user()->update(['approve' => true]);
        return  back()->with('success','request been send , we will inform you to pay if you been accepted by our admins');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
