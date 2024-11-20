<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Sesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('calendar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        
        $events = Sesin::all();

        $events = $events->map(function ($e) {
            return [
                "start" => $e->start_time,
                "end" => $e->end_time,
                "color" => "#fcc102",
                "passed" => false,
                "title" => Auth::user()->name,
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
        //
        request()->validate([
            "start"=>"required",
            "end"=>"required"
        ]);

        Calendar::create([
            "start"=>$request->start . ":00",
            "end"=>$request->end . ":00",
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}
