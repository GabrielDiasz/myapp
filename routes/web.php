<?php

use App\Http\Controllers\UserControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::prefix('users')->group(function () {
    Route::get('/index', [UserControler::class, 'index'])->name('users.index');

    Route::get('/create', [UserControler::class, 'create'])->name('users.create');
    Route::post('/store', [UserControler::class, 'store'])->name('users.store');

    Route::get('/edit/{id}', [UserControler::class, 'edit'])->name('users.edit');
    Route::put('/update', [UserControler::class, 'update'])->name('users.update');

    Route::delete('/delete/{id}', [UserControler::class, 'destroy'])->name('users.delete');
});
