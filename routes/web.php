<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedecinController;


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
    return view('welcome');
});

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/monprofil', 'App\Http\Controllers\DashboardController@monprofil')->name('dashboard.monprofil');
    Route::resource('consultation', DashboardController::class);

});

// for admin
Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::resource('user', UserController::class);
});

//for doctor
Route::group(['middleware' => ['auth', 'role:medecin']], function() { 
    Route::resource('doctor', MedecinController::class);

});

require __DIR__.'/auth.php';
