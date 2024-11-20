<?php

namespace App\Http\Controllers;

use App\Models\Join;
use App\Models\Sesin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        

        
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
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //

        $user = Auth::user();
        $joinedSessions = $user->exerciceSesins; 
        $doneExercises = $user->DoneExercice ;
        $favoriteExercises = $user->favoriteExercises;
        $bodyInformations = $user->userBodyInfo  ;
        // dd($bodyInformations);

        return view('trainer.authProfile',compact('joinedSessions','doneExercises','favoriteExercises','bodyInformations'));
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
