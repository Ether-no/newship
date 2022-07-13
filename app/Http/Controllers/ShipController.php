<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\guilds;
use App\Models\ships;
use App\Models\expedient;
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
    public function editship(Request $request)
    {
        if (auth()->user()) {
            $iduser = auth()->user()->id;
            $all =  $request->except('_token');
            $existe = DB::table('ships')->where('id_ship','=',$request->id_ship)->count();
            if ($existe === 1) {
                $shipedit = ships::find($request->id_ship);
                if ($request->nameship != $shipedit->nameship) {
                    $shipedit->nameship = $request->nameship;
                    $shipedit->update();
                    $expedient =  expedient::create([
                        'id_ship' => $request->id_ship,
                        'id_usuario' => $iduser,
                        'description' =>  "the player's name has been changed"
                    ]);
                }
                if($request->id_guild != $shipedit->id_guild){
                    $shipedit->id_guild = $request->id_guild;
                    $shipedit->update();
                    $expedient =  expedient::create([
                        'id_ship' => $request->id_ship,
                        'id_usuario' => $iduser,
                        'description' =>  "the player's guild has been changed"
                    ]);
                }
                if($request->status != $shipedit->status){
                    $shipedit->status = $request->status;
                    $shipedit->update();
                    $expedient =  expedient::create([
                        'id_ship' => $request->id_ship,
                        'id_usuario' => $iduser,
                        'description' =>  "the player's status has been changed"
                    ]);
                }
                return redirect('/home');
            } else {
                return redirect('/home');
            }
        }
    }
}
