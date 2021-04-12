<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group( function() {
    Route::get(
        '/landing',
        [ LandingController::class, 'index' ]
    )->name('landing');
});


Route::get('/', function () {
    return view('login');
})->name('main');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Route::middleware(['first', 'second'])->group(function () {
    Route::get(
        '/user/profile',
        [UserProfileController::class, 'show']
    )->name('profile');

    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
}); */
