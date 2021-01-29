<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::get();
        $authuser = Auth::user();
        if ($authuser->role_id === 1) {
            return view('apartments.index', [
            'apartments' => $apartments,
            'authuser' => $authuser
            ]);
        }else{
            return redirect()->route('home')->with('error', 'You are not an admin');
        }
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);
        dd($apartment);
        $monthlyincomes = $apartment->monthlyincomes()->get();
        dd($monthlyincomes);
        $authuser = Auth::user();
        if ($authuser->role_id === 1) {
            return view('apartments.show', [
            'apartment' => $apartment,
            'authuser' => $authuser,
            'monthlyincomes' => $monthlyincomes
            ]);
        }else{
            return redirect()->route('home')->with('error', 'You are not an admin');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
