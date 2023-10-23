<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\AuthApi\EditApiController;
use App\Http\Controllers\API\v1\AuthApi\LoginApiController;
use App\Http\Controllers\API\v1\Survey\SurveyApiController;
use App\Http\Controllers\API\v1\AuthApi\LogoutApiController;
use App\Http\Controllers\API\v1\AuthApi\RegisterApiController;
use App\Http\Controllers\API\v1\CategorySurvey\CategoryApiSurveyController;

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


Route::prefix('v1')->group(function () {

    Route::post('/register', App\Http\Controllers\API\v1\AuthApi\RegisterApiController::class)->name('register');
    Route::post('/login', App\Http\Controllers\API\v1\AuthApi\LoginApiController::class)->name('login');
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', App\Http\Controllers\API\v1\AuthApi\LogoutApiController::class)->name('logout');
    Route::put('/user/edit', App\Http\Controllers\API\v1\AuthApi\EditApiController::class)->name('user.edit');

    Route::get('/survey', [App\Http\Controllers\API\v1\Survey\SurveyApiController::class, 'index'])->name('survey');

    Route::get('/user/location', [App\Http\Controllers\API\v1\UserLocation\UserLocationApiController::class, 'index'])->name('user.location');
    Route::middleware('auth:api')->group(function () {
        Route::get('/user/location/{id}', [App\Http\Controllers\API\v1\UserLocation\UserLocationApiController::class, 'AuthIndex'])->name('user.location');
        Route::post('/user/location/store', [App\Http\Controllers\API\v1\UserLocation\UserLocationApiController::class, 'store'])->name('user.location.store');
    });

    Route::get('/category', [App\Http\Controllers\API\v1\CategorySurvey\CategoryApiSurveyController::class, 'index'])->name('category');
    Route::get('/category/{id}', [App\Http\Controllers\API\v1\CategorySurvey\CategoryApiSurveyController::class, 'show'])->name('category.show');

    // Route::middleware('auth:api')->group(function () {
    // });
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
