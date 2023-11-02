<?php

use App\Http\Controllers\Manager\ContactController;
use App\Http\Controllers\Manager\ListController;
use App\Http\Controllers\Manager\LoginController;
use App\Http\Controllers\Manager\PageController;
use App\Http\Controllers\Manager\UserController;
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

Route::name('main.')->controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/view/{view}', 'view')->name('view');
});

Route::name('users.')->prefix('users')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::controller(ListController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::name('contact.')->prefix('contact')->controller(ContactController::class)->group(function () {
                Route::get('/new', 'index')->name('index');
                Route::get('/view/{contact}', 'view')->name('view');
                Route::post('/new', 'store')->name('store');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{contact}', 'edit')->name('edit');
                Route::put('/update/{contact}', 'update')->name('update');
                Route::delete('/delete/{contact}', 'destroy')->name('destroy');
            });
        });
    });

    Route::name('register.')->prefix('register')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/create', 'create')->name('create');
    });
    
    Route::name('login.')->prefix('auth')->controller(LoginController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout');
    });

});
