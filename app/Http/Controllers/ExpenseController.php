<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Expense;
use App\Models\Monthlyexpense;
use Illuminate\Http\Request;
use Auth;

class ExpenseController extends Controller
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
        $user = Auth::user();
        $monthlyexpenses = Monthlyexpense::where('apartment_id', $user->apartment_id)->get();
        if ($user->role_id === 1) {
            return view('expenses.create', [
            'monthlyexpenses' => $monthlyexpenses,
            'user' => $user
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
            'monthlyexpense' => 'required',
            'name' => 'required',
            'amount' => 'required'
        ]);


        $expense = new Expense();
        $expense->monthlyexpense_id = request('monthlyexpense');
        $expense->name = request('name');
        $expense->amount = request('amount');

        $expense->save();
        $monthlyexpense = $expense->monthlyexpense;
        $monthlyexpense->totalexpense +=  $expense->amount;
        return redirect()->route('home')->with('success', 'New Expense Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
