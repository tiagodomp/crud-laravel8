<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('users/search', [UserController::class, 'search'])->name('users.search');

Route::resource('users', UserController::class)
        ->only(['index', 'store', 'update', 'destroy'])
        ->missing(function () {
            return redirect('users.index');
        });
