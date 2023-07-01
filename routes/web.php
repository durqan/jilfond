<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorizeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', [AuthorizeController::class, 'authorize_form'])->name('login');
Route::get('/home_page', [HomePageController::class, 'home_page'])->middleware('auth');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/reg', [RegistrationController::class, 'registration_form']);
Route::post('/do_reg', [RegistrationController::class, 'action_registration']);
Route::post('/authorize', [AuthorizeController::class, 'action_authorization']);
