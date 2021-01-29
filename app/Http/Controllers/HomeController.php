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

        $monthlyincomes = $user->apartment->monthlyincomes;
        //dd($monthlyincomes);



        //adding dues to spesific apartment's spesific monthlyincome

        foreach ($monthlyincomes as $monthlyincome) {
            foreach ($payeddues as $payeddue) {
                //dd($payeddue);
                if ($payeddue->monthlyincome->id === $monthlyincome->id) {
                    $monthlyincome->totalincome += $payeddue->amount;
                    //dd($monthlyincome->totalincome);
                }
            }
        }

        /*foreach ($payeddues as $payeddue) {
            foreach ($monthlyincomes as $monthlyincome) {
                //dd($monthlyincome);
                if ($payeddue->monthlyincome->id === $monthlyincome->id) {
                    $monthlyincome->totalincome += $payeddue->amount;
                    dd($monthlyincome->totalincome);
                }
            }
        }*/


        return view('home', [
            'user' => $user,
            'unpayeddues' => $unpayeddues,
            'monthlyincomes' => $monthlyincomes,
            'announcements' => $announcements
        ]);
        //return view('home');
    }
}
