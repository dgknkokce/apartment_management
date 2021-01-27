<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;





class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $apartments = Apartment::get();
        return view('registers.create', [
            'apartments' => $apartments
        ]);
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $selectedUser = User::where('apartment_id', request('apartment'))->where('flat_no',request('flat_no'))->get();
        $userCount = $selectedUser->count();
        if ($userCount > 0) {
            return redirect()->route('registers.create')->with('error', 'There is someone in that flat');
        }else{
            $user = new User();
            $user->apartment_id = request('apartment');
            $user->fullname = request('name');
            $user->tel_no = request('tel_no');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->flat_no = request('flat_no');
            $user->payment_type = request('payment_type');
            $user->role_id = 2;
            $user->save();
            return redirect()->route('registers.create')->with('success', 'Your register was successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
