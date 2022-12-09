<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiSettingSiang;
use App\Http\Controllers\Api\ApiSettingMalam;
use App\Http\Controllers\Api\ApiKodeMalam;
use App\Http\Controllers\Api\ApiKodeSiang;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('setting/siang', [ApiSettingSiang::class, 'index']);
Route::get('setting/malam', [ApiSettingMalam::class, 'index']);

Route::get('kode/siang', [ApiKodeSiang::class, 'index']);
Route::get('kode/malam', [ApiKodeMalam::class, 'index']);

Route::get('kode/update/{id}', [ApiKodeSiang::class, 'update']);
Route::get('kode/update/{id}', [ApiKodeMalam::class, 'update']);