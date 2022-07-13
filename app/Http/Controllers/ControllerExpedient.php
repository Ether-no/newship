<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guilds;
use App\Models\ships;
use App\Models\expedient;
use Illuminate\Support\Facades\DB;
class ControllerExpedient extends Controller
{
    public function registerexpedient(Request $request)
    {
        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $expedient =  expedient::create([
                'id_ship' => $request->id_ship,
                'id_usuario' => $iduser,
                'description' =>  $request->expedient
            ]);
            return redirect('/home');
        }
    }
    public function expedientget($id)
    {
        $expedient = DB::table('expedient')
        ->join('ships', 'ships.id_ship', '=' ,'expedient.id_ship')
        ->join('users', 'users.id', '=' ,'expedient.id_usuario')
        ->where('expedient.id_ship','=',$id)
        ->select('users.name','expedient.description','expedient.created_at')
        ->get();
        return view('component.expedienttable',compact('expedient'));

    }
    public function openedit($id)
    {
        $ship = DB::table('ships')
        ->join('guilds', 'guilds.id_guild', '=' ,'ships.id_guild')
        ->where('ships.id_ship','=',$id)
        ->first();
        $guilds = guilds::all();
        return view('component.editship',compact('ship','guilds'));
    }
}
