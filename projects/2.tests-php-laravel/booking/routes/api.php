<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'hotels'

], function ($router) {

    Route::get('', [HotelController::class, 'index']);
    Route::get('{hotel}', [HotelController::class, 'show']);
    Route::post('', [HotelController::class, 'store'])->middleware('role:admin');
    Route::put('{hotel}', [HotelController::class, 'update'])->middleware('role:admin');
    Route::delete('{hotel}', [HotelController::class, 'destroy'])->middleware('role:admin');
    Route::post('{hotel}/rooms', [RoomController::class, 'store'])->middleware('role:admin');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'rooms'

], function ($router) {

    Route::get('', [RoomController::class, 'index']);
    Route::get('{room}', [RoomController::class, 'show']);
    Route::put('{room}', [RoomController::class, 'update'])->middleware('role:admin');
    Route::post('{room}/bookings', [BookingController::class, 'store'])->middleware('auth');
    Route::delete('{room}', [RoomController::class, 'destroy'])->middleware('role:admin');

});
