<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Front\HomeController;
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

Route::name('front.')->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('index');
});

Route::match(['GET', 'POST'], 'login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::prefix('admin')->middleware('admin', 'auth')->name('admin.')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('setting')->name('setting.')->group(function () {
        // Route::get('', [SettingController::class, 'index'])->name('index');
        // Route::get('fetch-data', [SettingController::class, 'fetchData'])->name('fetch-data');
        Route::match(['GET', 'POST'], 'add', [SettingController::class, 'add'])->name('add');
        // Route::match(['GET', 'POST'], 'edit', [SettingController::class, 'edit'])->name('edit');
        // Route::get('del', [SettingController::class, 'del'])->name('del');
    });
    Route::prefix('homeSetting')->name('homeSetting.')->group(function () {
        // Route::get('', [HomeSettingController::class, 'index'])->name('index');
        // Route::get('fetch-data', [HomeSettingController::class, 'fetchData'])->name('fetch-data');
        Route::match(['GET', 'POST'], 'add', [HomeSettingController::class, 'add'])->name('add');
        // Route::match(['GET', 'POST'], 'edit', [HomeSettingController::class, 'edit'])->name('edit');
        // Route::get('del', [HomeSettingController::class, 'del'])->name('del');
    });
    Route::prefix('WorkProcess')->name('WorkProcess.')->group(function () {
        // Route::get('', [WorkProcessController::class, 'index'])->name('index');
        // Route::get('fetch-data', [WorkProcessController::class, 'fetchData'])->name('fetch-data');
        Route::match(['GET', 'POST'], 'add', [WorkProcessController::class, 'add'])->name('add');
        // Route::match(['GET', 'POST'], 'edit', [WorkProcessController::class, 'edit'])->name('edit');
        // Route::get('del', [WorkProcessController::class, 'del'])->name('del');
    });
});
