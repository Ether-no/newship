<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guilds;
use App\Models\ships;
use Illuminate\Support\Facades\DB;

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
        $guilds = guilds::all();
        $ships = DB::table('ships')
        ->join('guilds', 'guilds.id_guild', '=' ,'ships.id_guild')
        ->get();

        return view('home',compact('guilds','ships'));
    }
}
