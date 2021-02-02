<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Apartment;
use App\Models\Due;
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
        $monthlyincomes = $apartment->monthlyincomes()->get();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function showDues(Request $request)
    {
        $this->validate(request(), [
            'month' => 'required',
            'status' => 'required',
            'year' => 'required'
        ]);
        $authuser = Auth::user();
        $wanteddues = Due::where('status', request('status'))->where('monthlyincome_id', request('month'))
        ->whereYear('created_at', '=', request('year'))->get();

        if ($authuser->role_id === 1) {
            return view('apartments.showdue', [
            'wanteddues' => $wanteddues
            ]);
        }else{
            return redirect()->route('home')->with('error', 'You are not an admin');
        }
    }
}
