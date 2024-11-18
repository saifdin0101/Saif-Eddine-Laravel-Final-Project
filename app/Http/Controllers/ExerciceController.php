<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use Illuminate\Http\Request;

class ExerciceController extends Controller
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
        
        request()->validate([
            'name' => 'required',
            'image' => 'required |image',
            'descreption' => 'required',
            'time' => 'required',
            'sesin_id' => 'required',
            'calories' => 'required|numeric',
            'location' => 'required',
            'premium' => 'nullable'
        ]);
       

        $image = $request->image;
        $imageName = hash('sha256', file_get_contents($image)) . '.' . $image->getClientOriginalExtension();
        $image->move(storage_path('app/public/images'), $imageName);
        
        Exercice::create([
            'name' => $request->name,
            'calories' => $request->calories,
            'descreption' => $request->descreption,
            'time' => $request->time,
            'location' => $request->location,
            'premium' => $request->premium ,
            'sesin_id'=>$request->sesin_id,
            'image' => $imageName,
        ]);
      
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercice $exercice)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercice $exercice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercice $exercice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercice $exercice)
    {
        //
    }
}
