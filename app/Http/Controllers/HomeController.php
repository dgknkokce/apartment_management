<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Due;
use App\Models\Announcement;
use App\Models\Monthlyincome;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();
        $announcements = Announcement::where('status', true)->get();
        $unpayeddues = Due::where('status', false)->get();
        $payeddues = Due::where('status', true)->get();



        //adding dues to spesific apartment's spesific monthlyincome
        foreach ($payeddues as $payeddue) {
            if ($payeddue->user->apartment->id === $user->apartment->id) {
                foreach ($user->apartment->monthlyincomes as $monthlyincome) {
                    if ($payeddue->monthlyincome_id === $monthlyincome->id) {
                        $monthlyincome->totalincome += $payeddue->amount;
                    }
                }
            }
        }
        $monthlyincomes = $user->apartment->monthlyincomes;


        return view('home', [
            'user' => $user,
            'unpayeddues' => $unpayeddues,
            'monthlyincomes' => $monthlyincomes,
            'announcements' => $announcements
        ]);
        //return view('home');
    }
}
