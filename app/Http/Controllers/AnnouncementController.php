<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Announcement;
use App\Models\Apartment;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $announcements = Announcement::get();
        $apartments = Apartment::get();
        $authuser = Auth::user();
        if ($authuser->role_id === 1){
            return view('announcements.create', [
            'announcements' => $announcements,
            'authuser' => $authuser,
            'apartments' => $apartments
            ]);
        }else{
            return redirect()->route('home')->with('error', 'You are not an admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'apartment' => 'required',
            'subject' => 'required'
        ]);

        $announcement = new Announcement();
        $announcement->apartment_id = request('apartment');
        $announcement->subject = request('subject');
        $announcement->status = true;

        $announcement->save();
        return redirect()->route('home')->with('success', 'New Announcement Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $announcement = Announcement::find($id);
        $announcement->status = false;
        $announcement->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
