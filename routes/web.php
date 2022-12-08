<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('pages.index');
Route::get('/day-results', [App\Http\Controllers\PageController::class, 'dayresults'])->name('pages.dayresults');
Route::get('/night-results', [App\Http\Controllers\PageController::class, 'nightresults'])->name('pages.nightresults');
Route::get('/first-page', [App\Http\Controllers\PageController::class, 'firstpage'])->name('pages.firstpage');
Route::get('/second-page', [App\Http\Controllers\PageController::class, 'secondpage'])->name('pages.secondpage');
Route::get('/third-page', [App\Http\Controllers\PageController::class, 'thirdpage'])->name('pages.thirdpage');

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
});

Auth::routes([
    'register' => false
]);

//Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/folder', [App\Http\Controllers\FileManagerController::class, 'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('/password', [App\Http\Controllers\PasswordController::class, 'edit'])->name('password.edit');
    Route::patch('/password', [App\Http\Controllers\PasswordController::class, 'updatePassword'])->name('password.updatePassword');

    //Roles Route
    Route::get('/roles/select', [App\Http\Controllers\RoleController::class, 'select'])->name('roles.select');
    Route::resource('/roles', \App\Http\Controllers\RoleController::class);

    //User Route
    Route::resource('/users', \App\Http\Controllers\UserController::class);

    // Day Route
    Route::resource('/days', App\Http\Controllers\DaysController::class);

    // Day Time Route
    Route::post('/update-day-time', [App\Http\Controllers\DayTimeController::class, 'update'])->name('daytime.update');
    Route::get('/edit-day-time/{id}', [App\Http\Controllers\DayTimeController::class, 'edit'])->name('daytime.edit');

    // Night Route
    Route::resource('/nights', App\Http\Controllers\NightsController::class);

    // Night Time Route
    Route::post('/update-night-time', [App\Http\Controllers\NightTimeController::class, 'update'])->name('nighttime.update');
    Route::get('/edit-night-time/{id}', [App\Http\Controllers\NightTimeController::class, 'edit'])->name('nighttime.update');

    //File Manager Route 
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/folder', [App\Http\Controllers\FileManagerController::class, 'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
   

    // First Page Route
    Route::resource('/first-page', App\Http\Controllers\FirstPageController::class);

    // Second Page Route
    Route::resource('/second-page', App\Http\Controllers\SecondPageController::class);

    // Third Page Route
    Route::resource('/third-page', App\Http\Controllers\ThirdPageController::class);

    // Website Setting Route
    Route::resource('/website-lov', App\Http\Controllers\WebsitelovController::class);

});
