<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guilds;
use App\Models\ships;
use Illuminate\Support\Facades\DB;

class ShipController extends Controller
{
    public function registership(Request $request)
    {
        $all =  $request->except('_token');
        $existe = DB::table('ships')->where('idship','=',$request->idship)->count();
        if ($existe === 1) {
            return redirect('/home');
        } else {
            $ships =  ships::create($all);
            return redirect('/home');
        }
        
        
    }
}
