<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FirstAidController;
use App\Models\Donation;

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



Route::get('/', [UserController::class, 'landing_page']);
Route::get('/login', [UserController::class, 'login_admin'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'action_login'])->middleware('guest');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard_admin']);
    Route::get('/donasi', [DonationController::class, 'data_donation']);
    Route::get('/donasi/{id}', [DonationController::class, 'read_donation']);
    Route::put('/donasi/terima/{id}', [DonationController::class, 'accept_donation']);
    Route::put('/donasi/tolak/{id}', [DonationController::class, 'decline_donation']);
    Route::put('/donasi/berakhir/{id}', [DonationController::class, 'finish_donation']);
    Route::get('/donasi/edit/{id}', [DonationController::class, 'edit_donation']);
    Route::put('/donasi/edit/{id}', [DonationController::class, 'update_donation']);
    Route::delete('/donasi/{id}', [DonationController::class, 'delete_donation']);
    Route::get('/donatur', [DonorController::class, 'data_donor']);
    Route::get('/datauser', [UserController::class, 'data_user']);
    Route::get('/datauser/{id}', [UserController::class, 'read_user']);
    Route::delete('/datauser/{id}', [UserController::class, 'delete_user']);
    Route::get('/firstaid', [FirstAidController::class, 'data_firstaid']);
    Route::get('/firstaid/{id}', [FirstAidController::class, 'read_firstaid']);
    Route::get('/firstaid/edit/{id}', [FirstAidController::class, 'edit_firstaid']);
    Route::put('/firstaid/edit/{id}', [FirstAidController::class, 'update_firstaid']);
    Route::get('/logout', [UserController::class, 'logout_admin']);
});
