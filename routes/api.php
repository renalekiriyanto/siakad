<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatapelajaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('getmapel/{mapel}', [MatapelajaranController::class, 'api_getdetail']);
Route::get('getkelas/{kelas}', [KelasController::class, 'api_getdetail']);
