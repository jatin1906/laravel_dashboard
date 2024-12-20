<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\sqlController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

    /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/;


Route::get('/', [loginController::class, 'login'])->name('login.login'); // login redirect
Route::post('/addlogin', [loginController::class, 'LoginUsers'])->name('addlogin.LoginUsers'); //login
Route::get('/logout', [loginController::class, 'logout'])->name('dashboard.logout'); // logout

Route::middleware(['auth'])->group(function () {
    Route::controller(loginController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('index.index');
    });

    Route::controller(pageController::class)->group(function () {
        Route::get('/cms', 'showCms')->name('cms.showCms');
        Route::get('/cms-add-form', 'cmsaddform')->name('cms.cmsadd');
        Route::get('/users', 'profile')->name('users.profile');
        Route::post('/change-password', 'changePassword')->name('change.password');
    });
});


// Route for sql

Route::controller(sqlController::class)->group(function () {
    Route::get('secSalary/{number}', 'secondhigestSalary');
});
