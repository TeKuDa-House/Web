<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AdsController;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CategoryController;
use App\Http\Controllers\Api\v1\FavoriteController;
use App\Http\Controllers\Api\v1\FeedbackController;
use App\Http\Controllers\Api\v1\MessagesController;
use App\Http\Controllers\Api\v1\PaybackController;
use App\Http\Controllers\Api\v1\ReportController;
use App\Http\Controllers\Api\v1\SellerController;
use App\Http\Controllers\Api\v1\ShippingAddressController;
use App\Http\Controllers\Api\v1\TransactionController;
use App\Http\Controllers\Api\v1\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('annonces', AdsController::class);
    Route::resource('favorites', FavoriteController::class);
    Route::resource('feedback', FeedbackController::class);
    Route::resource('messages', MessagesController::class);
    Route::resource('payback', PaybackController::class);
    Route::resource('report', ReportController::class);
    Route::resource('seller', SellerController::class);
    Route::resource('shipping-address', ShippingAddressController::class);
    Route::resource('transactions', TransactionController::class);
});

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('me', [AuthController::class, 'me']);
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
