<?php

use Illuminate\Http\Request;
use App\TBA\MakeAuthTbaAction;
use App\TBA\MakeProductAction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// les routes du authcontroller 
Route::post('register', [AuthController::class, 'storeUser']);
Route::post('login', [AuthController::class, 'connexion']);

Route::post('forgotpass', [AuthController::class, 'forgotPass']);
Route::post('update', [AuthController::class, 'updatePass']);

Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verify_email'])->middleware(['auth:sanctum', 'signed'])->name('verification.verify');
Route::get('/email/verification-notification', [AuthController::class, 'verify_notification'])->middleware(['auth:sanctum', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'IsAdmin', 'HasCompany'])->group(function () {

    Route::get('users', [AuthController::class, 'index']);
    Route::post('newUser', [AuthController::class, 'simpleUser']);
    Route::get('user/{id}', [AuthController::class, 'getUser']);
    Route::put('alterUser/{id}', [AuthController::class, 'updateUser']);
    Route::delete('delUser/{id}', [AuthController::class, 'delUser']);
    Route::get('searchUser', [AuthController::class, 'search']);

});
