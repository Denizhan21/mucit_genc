<?php

namespace App\Http\Controllers;

use App\Club;
use App\Club_user;
use Illuminate\Http\Request;

class ClubUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club_student = Club_user::where('club_id','=',$_GET['club'])->get();
        return view('admin.club_user.index',compact('club_student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club_user  $club_user
     * @return \Illuminate\Http\Response
     */
    public function show(Club_user $club_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club_user  $club_user
     * @return \Illuminate\Http\Response
     */
    public function edit(Club_user $club_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club_user  $club_user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club_user $club_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club_user  $club_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club_user $club_user)
    {
        //
    }
}
