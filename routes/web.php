<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BSCController;
use App\Http\Controllers\ColectorController;
use App\Http\Controllers\MapviewersController;
use App\Http\Controllers\OpenController;
use App\Http\Controllers\PlanesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiciosMapController;
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


//Admin All Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','Profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/store/profile','StoreProfile')->name('store.profile');
    //
    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::get('/update/password','UpdatePassword')->name('update.password');

    //
    Route::get('/admin/servicios','Servicios')->name('admin.open.services');

});


//Livewire
Route::get('avatar/{user}',Avatar::class)->name('avatar');

Route::controller(PlanesController::class)->group(function(){
    Route::get('/planes', 'planes')->name('planes.index');
    Route::get('/planes/plan/{id}','plan')->name('planes.plan');
});

Route::controller(OpenController::class)->group(function(){
    Route::get('/open','servicios')->name('open.index');
    Route::get('search','searchServices')->name('search.services');
    Route::get('searchi','searchiServices')->name('searchi.services');
    Route::get('searchservicescards','searchServicesCards')->name('searchServicesCards.services');
});

Route::controller(ColectorController::class)->group(function(){
    Route::get('/colector','colector')->name('colector.index');
});

Route::controller(BSCController::class)->group(function(){
    Route::get('/bsc','bsc')->name('bsc.index');
});


Route::controller(MapviewersController::class)->group(function(){
    Route::get('/mapviewers','mapviewers')->name('mapviewers.index');
    Route::get('/map/{idmap}', 'mapa')->name('mapviewer.map');
});


Route::controller(ServiciosMapController::class)->group(function(){
    Route::get('/admin/servicesmap/create','CrearServicioMapa')->name('admin.servicesmap.create');
    Route::post('/admin/servicesmap/storage','StorageServicioMapa')->name('admin.servicesmap.storage');
    Route::get('/admin/servicesmap/edit','EditServicioMapa')->name('admin.servicesmap.edit');
    Route::put('/admin/servicesmap/update/{id}','UpdateServicioMapa')->name('admin.servicesmap.update');
    Route::get('/admin/servicesmap/destroy','destroy')->name('admin.servicesmap.destroy');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// Route::get('/dashboard', function(){
//     return view('dashboard');
// })->middleware(['auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'])->name('dashboard');



Route::get('/dashboard', function(){
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');




Route::middleware('auth')->group(function(){
    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');
});
