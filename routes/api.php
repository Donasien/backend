<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FirstAidController;
use App\Http\Controllers\BloodDonorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/google', [UserController::class, 'google']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile', [UserController::class, 'update_profile']);
Route::get('/all-donation', [DonationController::class, 'all_donation']);
Route::get('/detail-donation', [DonationController::class, 'detail_donation']);
Route::post('/submit-donation', [DonationController::class, 'submit_donation']);
Route::get('/donation-status', [DonationController::class, 'donation_status']);
Route::get('/donation-history', [DonorController::class, 'donation_history']);
Route::post('/donate', [DonorController::class, 'donate']);
Route::get('/first-aid', [FirstAidController::class, 'first_aid']);
Route::get('/blood-donor', [BloodDonorController::class, 'all_blood']);
Route::post('/blood-donor', [BloodDonorController::class, 'submit_blood']);
Route::delete('/blood-donor', [BloodDonorController::class, 'delete_blood']);
