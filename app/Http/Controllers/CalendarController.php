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
    // Fetch all calendar events
    $events = Calendar::all();

    // Function to generate a random color
    $generateRandomColor = function () {
        // Generates a random color in hex format
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    };

    // Map events and assign random colors
    $events = $events->map(function ($e) use ($generateRandomColor) {
        return [
            "id" => $e->id, // Ensure we have the event id for updating
            "start" => $e->start,
            "end" => $e->end,
            "color" => $generateRandomColor(), // Assign a random color to each event
            "passed" => false,
            "title" => Auth::user()->name,
            "imageUrl" => asset('storage/images/' . Auth::user()->image), // Include the user's image URL
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
      
        $request->validate([
            "start" => "required|date",
            "end" => "required|date|after:start",
        ]);
    
        $overlappingEvent = Calendar::where(function($query) use ($request) {
            $query->whereBetween('start', [$request->start, $request->end])
                  ->orWhereBetween('end', [$request->start, $request->end])
                  ->orWhere(function($query) use ($request) {
                      $query->where('start', '<', $request->start)
                            ->where('end', '>', $request->end);
                  });
        })->exists();
    
       
        if ($overlappingEvent) {
            return back()->with(['error','This time slot is already been taken . Please choose a different time.']);
        }
    

        Calendar::create([
            "start" => $request->start . ":00",
            "end" => $request->end . ":00",
        ]);
    

        return back()->with('success', 'Event created successfully.');
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
