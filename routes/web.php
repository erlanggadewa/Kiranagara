<?php

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


Route::middleware(['auth', 'check.role:admin,user'])->group(function () {
  Route::get('/', function () {
    return view('index-user');
  })->name('index-user');
});

Route::middleware(['auth', 'check.role:admin'])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});


require __DIR__ . '/auth.php';
