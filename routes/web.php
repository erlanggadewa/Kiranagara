<?php

use App\Models\CulturalData;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CulturalDataController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
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
  Route::get('/', [DashboardUserController::class, 'index'])->name('dashboard-user');

  Route::get('/quiz/{level}', [QuizController::class, 'index'])->name('quiz-user');

  Route::get('/budaya/{id}', [CulturalDataController::class, 'index'])->name('budaya-user');

  Route::get('/daerah/{region}', [RegionController::class, 'index'])->name('daerah-user');
});

Route::middleware(['auth', 'check.role:admin'])->prefix('admin')->group(function () {

  Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard-admin');



  Route::get('/budaya', [CulturalDataController::class, 'create'])->name('budaya-admin');

  Route::post('/crop-kategori-budaya', [CulturalCategoryController::class, 'crop'])->name('crop-kategori-budaya');
  Route::resource('kategori-budaya', CulturalCategoryController::class);

  Route::post('/crop-data-budaya', [CulturalDataController::class, 'crop'])->name('crop-data-budaya');
  Route::resource('data-budaya', CulturalDataController::class);

  Route::post('/crop-kuis', [QuizController::class, 'crop'])->name('crop-kuis');
  Route::resource('kuis-admin', QuizController::class);

  Route::post('/crop-daerah', [RegionController::class, 'crop'])->name('crop-daerah');
  Route::resource('daerah-admin', RegionController::class);
});


require __DIR__ . '/auth.php';
