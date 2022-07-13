<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guilds;

class GuildController extends Controller
{
    public function registerguild(Request $request)
    {
       
        $all =  $request->except('_token');
        $guild =  guilds::create($all);
        return redirect('/home');
    }
}
