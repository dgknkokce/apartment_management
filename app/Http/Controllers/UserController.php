<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $user = Auth::user();
        if ($user->role_id === 1) {
            return view('admin', [
            'user' => $user,
            'users' => $users
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
        $apartment = Auth::user()->apartment;
        $user = Auth::user();
        if ($user->role_id === 1){
            return view('users.create', [
            'apartment' => $apartment
            ]);
            return view('users.create');
        }else{
            return redirect()->route('home')->with('alert', 'You are not an admin');
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);


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

        return redirect()->route('home')->with('alert', 'User Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (Auth::user()->id == $id) {
            return redirect()->route('admin')->with('error', 'You cant Move Out Yourself');
        }
        $user->delete();
        return redirect()->route('admin')->with('success', 'User Moved Succesfully');
    }
}
