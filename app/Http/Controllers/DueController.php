<?php

namespace App\Http\Controllers;

use App\Models\Due;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;



class DueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $unpayeddues = Due::where('status', false)->get();

        if ($user->role_id === 1) {
            return view('dues.index', [
            'unpayeddues' => $unpayeddues
            ]);
        }else{
            return redirect()->route('home')->with('alert', 'You are not an admin');
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
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function show(Due $due)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function edit(Due $due)
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
        $due = Due::find($id);
        $due->status = true;
        $due->save();
        return redirect()->route('dues.index')->with('success', 'Due of {{ $due->user->fullname }} payed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Due  $due
     * @return \Illuminate\Http\Response
     */
    public function destroy(Due $due)
    {
        //
    }
}
