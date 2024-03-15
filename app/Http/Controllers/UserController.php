<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            echo "UserController,view (users.create)";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            $profile=new Profile;
            $profile=user_id->$request->user_id;
            $profile=mobile->$request->mobile;
            $profile=linkedin->$request->linkedin;
            $profile=portfolio->$request->portfolio;
            $profile=github->$request->github;
            $profile=gender->$request->gender;

            $profile->save();
            return $profile;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!User::find($id)){
            $profile=new Profile;
            $profile=user_id->$request->user_id;
            $profile=mobile->$request->mobile;
            $profile=linkedin->$request->linkedin;
            $profile=portfolio->$request->portfolio;
            $profile=github->$request->github;
            $profile=gender->$request->gender;

            $profile->save();

        }
        return User::find($id);
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
