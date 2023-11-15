<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Web\SurveyHistori\SurveyHistoriController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/redirect', [App\Http\Controllers\Auth\RedirectAuthController::class, 'redirect'])->name('redirect');


Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::get('/home/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Halaman User Admin
    Route::controller(\App\Http\Controllers\Web\User_Admin\UserAdminController::class)->group(function () {
        Route::get('userAdmin', 'index')->name('userAdmin.index');
        Route::get('userAdmin/{id}', 'show')->name('userAdmin.show');
        Route::get('userAdmin/{id}/edit', 'edit')->name('userAdmin.edit');
        Route::patch('userAdmin/{id}', 'update')->name('userAdmin.update');
        Route::delete('userAdmin/delete/{id}', 'destroy')->name('userAdmin.destroy');
    });

    //Halaman User Pengguna
    Route::controller(\App\Http\Controllers\Web\User_Pengguna\UserPenggunaController::class)->group(function () {
        Route::get('userPengguna', 'index')->name('userPengguna.index');
        Route::get('userPengguna/{id}', 'show')->name('userPengguna.show');
        Route::get('userPengguna/{id}/edit', 'edit')->name('userPengguna.edit');
        Route::put('userPengguna/{id}', 'update')->name('userPengguna.update');
        Route::delete('userPengguna/delete/{id}', 'destroy')->name('userPengguna.destroy');
    });

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

    //User Location
    Route::controller(\App\Http\Controllers\Web\User_Location\UserLocationController::class)->group(function () {
        Route::get('user_location', 'index')->name('user_location.index');
        Route::get('user_location/{id}', 'show')->name('user_location.show');
    });

    //Survey History
    Route::controller(\App\Http\Controllers\Web\SurveyHistori\SurveyHistoriController::class)->group(function () {
        Route::get('survey_histories', 'index')->name('survey_histories.index');
        Route::get('survey_histories/create', 'create')->name('survey_histories.create');
        Route::post('survey_histories/store', 'store')->name('survey_histories.store');
        Route::get('survey_histories/{id}', 'show')->name('survey_histories.show');
        Route::get('survey_histories/{id}/edit', 'edit')->name('survey_histories.edit');
        Route::put('survey_histories/{id}', 'update')->name('survey_histories.update');
        Route::delete('survey_histories/delete/{id}', 'destroy')->name('survey_histories.destroy');
    });

    //User Poin
    Route::controller(\App\Http\Controllers\Web\User_Poin\UserPoinController::class)->group(function () {
        Route::get('user_poin', 'index')->name('user_poin.index');
        Route::get('user_poin/create', 'create')->name('user_poin.create');
        Route::post('user_poin/store', 'store')->name('user_poin.store');
        Route::get('user_poin/{id}', 'show')->name('user_poin.show');
        Route::get('user_poin/{id}/edit', 'edit')->name('user_poin.edit');
        Route::put('user_poin/{id}', 'update')->name('user_poin.update');
        Route::delete('user_poin/delete/{id}', 'destroy')->name('user_poin.destroy');
    });

    Route::controller(\App\Http\Controllers\Web\Report\ReportController::class)->group(function () {
        Route::get('report/poin', 'report_poin')->name('report.report_poin');
        Route::get('report/survey', 'report_survey')->name('report.report_survey');
    });
});
