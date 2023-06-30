<?php

use App\Http\Controllers\MapviewersController;
use App\Http\Controllers\PlanesController;
use App\Http\Livewire\Avatar;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('frontend.index',[
        'users' => User::latest()->get()
    ]);
});

//Livewire
Route::get('avatar/{user}',Avatar::class)->name('avatar');

Route::controller(PlanesController::class)->group(function(){
    Route::get('/planes', 'planes')->name('planes.index');
    Route::get('/planes/plan/{id}','plan')->name('planes.plan');
});

Route::controller((MapviewersController::class))->group(function(){
    Route::get('/mapviewers','mapviewers')->name('mapviewers.index');
    Route::get('/map/{idmap}', 'mapa')->name('mapviewer.map');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
