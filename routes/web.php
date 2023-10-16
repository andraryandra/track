<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Kategori Survey
    Route::controller(\App\Http\Controllers\Web\CategorySurvey\CategorySurveyController::class)->group(function () {
        Route::get('/category', 'index')->name('category.index');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/store', 'store')->name('category.store');
        Route::get('/category/{id}', 'show')->name('category.show');
        Route::get('/category/{id}/edit', 'edit')->name('category.edit');
        Route::put('/category/{id}', 'update')->name('category.update');
        Route::delete('/category/delete/{id}', 'destroy')->name('category.destroy');
    });

    //Survey
    Route::controller(\App\Http\Controllers\Web\Survey\SurveyController::class)->group(function () {
        Route::get('/survey', 'index')->name('survey.index');
        Route::get('/survey/create', 'create')->name('survey.create');
        Route::post('/survey/store', 'store')->name('survey.store');
        Route::get('/survey/{id}', 'show')->name('survey.show');
        Route::get('/survey/{id}/edit', 'edit')->name('survey.edit');
        Route::put('/survey/{id}', 'update')->name('survey.update');
        Route::get('/survey/delete/{id}', 'destroy')->name('survey.destroy');
    });
});
