<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
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

    Route::prefix('about')->name('about.')->group(function () {
        Route::match(['GET', 'POST'], 'add', [AboutController::class, 'add'])->name('add');
        Route::match(['GET', 'POST'], 'edit/{id}', [AboutController::class, 'edit'])->name('edit');
        Route::get('delete/{id}', [AboutController::class, 'delete'])->name('delete');
    });

    Route::prefix('project')->name('project.')->group(function () {
        Route::match(['GET', 'POST'], 'category', [ProjectController::class, 'category'])->name('category');
        Route::match(['GET', 'POST'], 'category-edit/{id}', [ProjectController::class, 'categoryEdit'])->name('categoryEdit');

        Route::get('delete-category/{id}', [ProjectController::class, 'deleteCategory'])->name('delete-category');
        Route::match(['GET', 'POST'], 'add/{category}', [ProjectController::class, 'list'])->name('list');
        Route::match(['GET', 'POST'], 'add', [ProjectController::class, 'add'])->name('add');
        Route::match(['GET', 'POST'], 'edit/{id}', [ProjectController::class, 'edit'])->name('edit');
        Route::get('delete/{id}', [ProjectController::class, 'delete'])->name('delete');
    });
    Route::prefix('service')->name('service.')->group(function () {
        Route::match(['GET', 'POST'], 'add', [ServicesController::class, 'add'])->name('add');
        Route::match(['GET', 'POST'], 'edit/{id}', [ServicesController::class, 'edit'])->name('edit');
        Route::match(['GET', 'POST'], 'delete/{id}', [ServicesController::class, 'delete'])->name('delete');
    });
    Route::prefix('team')->name('team.')->group(function () {
        Route::match(['GET', 'POST'], 'add', [TeamController::class, 'add'])->name('add');
        Route::match(['GET', 'POST'], 'edit/{id}', [TeamController::class, 'edit'])->name('edit');
        Route::match(['GET', 'POST'], 'delete/{id}', [TeamController::class, 'delete'])->name('delete');
    });
    Route::prefix('contact')->name('contact.')->group(function () {
        Route::match(['GET', 'POST'], 'add', [ContactUsController::class, 'add'])->name('add');
    });
});
