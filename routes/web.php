<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\NoteController;

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

Route::get('sign-in', function () {
    return view('sign-in');
})->name('sign-in');

Route::get('sign-up', function () {
    return view('sign-up');
})->name('sign-up');

Route::post('sign-in', [UserController::class, 'login']);
Route::post('sign-up', [UserController::class, 'create']);

Route::middleware('isNotGuest')->group(function () {

    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::get('test', function () {
        dd(Auth::user());
    });

    Route::resource('note', NoteController::class);
});
