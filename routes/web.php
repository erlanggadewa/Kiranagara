<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CulturalCategoryController;

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
    return view('user.index-user');
  })->name('index-user');

  Route::post('/crop', [UploadController::class, 'crop'])->name('crop');
});

Route::middleware(['auth', 'check.role:admin'])->prefix('admin')->group(function () {
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  })->name('dashboard-admin');

  Route::resource('budaya', CulturalCategoryController::class);
});


require __DIR__ . '/auth.php';
