<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $ships = DB::table('ships')
    ->join('guilds', 'guilds.id_guild', '=' ,'ships.id_guild')
    ->get();
    return view('welcome',compact('ships'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/registerguild', [App\Http\Controllers\GuildController::class, 'registerguild'])->name('guild.register');
Route::post('/registership', [App\Http\Controllers\ShipController::class, 'registership'])->name('ship.register');
Route::post('/registerexpedient', [App\Http\Controllers\ControllerExpedient::class, 'registerexpedient'])->name('expedient.register');

Route::get('/expedientget/{id}', [App\Http\Controllers\ControllerExpedient::class, 'expedientget']);
Route::get('/openedit/{id}', [App\Http\Controllers\ControllerExpedient::class, 'openedit']);
Route::post('/editship', [App\Http\Controllers\ShipController::class, 'editship'])->name('ship.edit');
