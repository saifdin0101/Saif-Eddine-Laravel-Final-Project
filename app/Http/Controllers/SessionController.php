<?php

namespace App\Http\Controllers;

use App\Models\Sesin;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sessions = Sesin::all();
        return view('trainer.session',compact('sessions'));
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
            'user_id' => $request->user_id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Sesin $Sesin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sesin $Sesin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesin $Sesin)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesin $Sesin)
    {
        //
    }
}
