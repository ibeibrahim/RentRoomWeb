<?php

use App\Http\Controllers\Api\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\LoginAPIController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\houses\HouseController;
use App\Http\Controllers\Api\Renter\SettingsController;

// use App\Http\Controllers\Auth\RegisterApiController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:api')->group(function () {
    Route::post('/logout',[\App\Http\Controllers\Api\Auth\LoginController::class, 'logout']);
});
Route::get('/test', function() {
    return response()->json(201);
    });
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [AuthLoginController::class, 'login']);
Route::get('/houses/all', [HouseController::class, 'allHouses']);
Route::get('/house/{id}', [HouseController::class, 'details']);
Route::get('/houses/sort/high-to-low', [HouseController::class, 'highToLow']);
Route::get('/houses/sort/low-to-high', [HouseController::class, 'lowToHigh']);
Route::get('/houses/area/{id}', [HouseController::class, 'areaWiseShow']);
Route::post('/search', [HouseController::class, 'search']);
Route::post('/search-by-range', [HouseController::class, 'searchByRange']);
// Route::post('/login', [LoginAPIController::class, 'login']);
Route::group(['as' => 'renter.', 'prefix' => 'renter', 'namespace' => 'renter', 'middleware' => ['auth', 'renter', 'verified']],
    function () {
        Route::get('/user', function (Request $request) {
            $profile = $request->user();
            return response()->json(['user'=> $profile], 200);
        });
        Route::get('/profile', [SettingsController::class, 'showProfile']);
    });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});