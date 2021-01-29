<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Due;
use App\Models\Role;
use App\Models\Apartment;
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
        $users = User::where('role_id', 2)->where('is_deleted', false)->get();
        $oldusers = User::where('role_id', 2)->where('is_deleted', true)->get();
        $unpayeddues = Due::where('status', false)->get();
        $authuser = Auth::user();
        if ($authuser->role_id === 1) {
            return view('admin', [
            'users' => $users,
            'authuser' => $authuser,
            'oldusers' => $oldusers,
            'unpayeddues' => $unpayeddues
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
        $apartment = Auth::user()->apartment;
        $authuser = Auth::user();
        if ($authuser->role_id === 1){
            return view('users.create', [
            'apartment' => $apartment
            ]);
            return view('users.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $selectedUser = User::where('apartment_id', request('apartment'))->where('flat_no',request('flat_no'))->get();
        $userCount = $selectedUser->count();
        if ($userCount > 0) {
            return redirect()->route('users.create')->with('error', 'There is someone in that flat');
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
            $user->is_deleted = false;
            $user->save();
            return redirect()->route('users.create')->with('success', 'Your register was successful');
        }
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartments = Apartment::get();
        $roles = Role::get();
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user,
            'apartments' => $apartments,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->apartment_id = request('apartment');
        $user->fullname = request('name');
        $user->tel_no = request('tel_no');
        $user->email = request('email');
        $user->flat_no = request('flat_no');
        $user->payment_type = request('payment_type');
        $user->role_id = request('role_id');
        $user->is_deleted = false;
        $user->save();

        return redirect()->route('admin')->with('success', 'User Updateed Succesfully');
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

        $user->flat_no = rand (300 , 800);
        $user->is_deleted = true;
        $user->save();
        return redirect()->route('admin')->with('success', 'User Moved Succesfully');
    }
}
