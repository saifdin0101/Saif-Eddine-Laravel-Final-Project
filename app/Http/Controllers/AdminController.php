<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $deletedUsers = User::onlyTrashed()->get();

        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.admin', compact('users', 'deletedUsers'));
    }
    public function restore($id)
    {
        //
        $deletedUsers = User::onlyTrashed()->find($id);
        $deletedUsers->restore();


        return back()->with('success', 'User Restored Succefully !!!');
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        
        if ($user->role =='client') {
            $user->update([
                "role" => 'trainer',
            ]);
        } else {
            $user->update([
                "role" => 'client',
            ]);
        }
       
        return back()->with('succes','Client Been Switched To Trainder Succecefully !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)

    {
        //
        $user->delete();
        return back()->with('success', 'User Deleted Succefully !!!');
    }
}
