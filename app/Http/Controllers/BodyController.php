<?php

namespace App\Http\Controllers;

use App\Models\Body;
use Illuminate\Http\Request;

class BodyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('body');
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
        // dd($request->user_id);
        request()->validate([
            'height'=>'required',
            'weight'=>'required',
            'user_id'=>'required',
            'bodytype'=>'required',
            'calories'=>'required'

        ]);
        
        Body::create([
            'height'=>$request->height,
            'weight'=>$request->weight,
            'user_id'=>$request->user_id,
            'calories'=>$request->calories,
            'bodytype'=>$request->bodytype
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Body $body)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Body $body)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Body $body)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Body $body)
    {
        //
    }
}
