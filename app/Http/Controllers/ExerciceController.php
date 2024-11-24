<?php

namespace App\Http\Controllers;

use App\Models\Body;
use App\Models\Done;
use App\Models\Exercice;
use App\Models\Sesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Pest\Laravel\get;

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
          
            'user_id' => 'required'
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
            'premium' => 'Recomanded',
            'sesin_id' => $request->sesin_id,
            'image' => $imageName,
            'user_id' => $request->user_id,
        ]);

        return back()->with('success','Exercice Been Created Succefully !!');
    }

    public function favorite(Request $request)
    {
        $user = auth()->user();
        $exoID = $request->exercice_id;


        if ($user->favoriteExercises()->where('exercice_id', $exoID)->exists()) {
            return back()->with('error', 'Exercise Already In Favorite');
        }


        $user->favoriteExercises()->attach($exoID);

        return back()->with('success', 'Exercice Added to the favorite list Succefully');
    }
    public function done(Request $request)
    {
        $user = auth()->user();
        $exoID = $request->exercice_id;


        if ($user->DoneExercice()->where('exercice_id', $exoID)->exists()) {
            return back()->with('error', 'Exercise Already marked as Done');
        }


        $userBody = Body::where('user_id', $user->id)->first();


        $burnedCalories = Exercice::where('id', $exoID)->first();



        if ($userBody && $burnedCalories) {

            $total = $userBody->calories - $burnedCalories->calories;


            $userBody->update([
                'calories' => $total,
            ]);
        }


        $user->DoneExercice()->attach($exoID);

        return back()->with('success', 'Exercice Added to the DoneList Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Sesin $session)
    {
        //
        // return view('trainer.ApprovePage');

    }
    public function ApprovePage(Sesin $session)
    {
        //
        $user = Auth::user();
        $TrainerSessions = Sesin::where('user_id',$user->id)->where('approve',false)->get();
        $PublishedSessions = Sesin::where('user_id',$user->id)->where('approve',true)->get();
      
        return view('trainer.ApprovePage',compact('TrainerSessions','PublishedSessions'));

    }
    public function publish(Sesin $session)
{
    $user = Auth::user();


    if ($session->user_id !== $user->id) {
        abort(403, 'Unauthorized action.');
    }

    $session->update([
        'approve' => true,
    ]);

    return back()->with('success','Session Been Published Succefully');
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
        $exercice->delete();
        return back()->with('success','Exercice Removed Succefully !!!');


    }
    public function dettach(Request $request)
    {
        //

        $user = auth()->user();
        $exoID = $request->exercise_id;



        if ($user->favoriteExercises()->where('favorites.exercice_id', $exoID)->where('favorites.user_id', $user->id)->exists()) {
            
            $user->favoriteExercises()->detach($exoID);
        }
        return back()->with('success', 'Exercice Been Removed From Favorite');
    }
}
