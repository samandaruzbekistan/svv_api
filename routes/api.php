<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\TokenController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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
Route::post('/token', [TokenController::class, 'createToken']);
Route::post('/change_token', [TokenController::class, 'changeToken']);


Route::middleware(['api_token'])->group(function () {
    Route::get('/zones', [ApiController::class, 'zones']);
    Route::get('/regions', [ApiController::class, 'getRegions']);
    Route::get('/districts/{region_id}', [ApiController::class, 'getDistricts']);
    Route::get('/district/{district_id}', [ApiController::class, 'getDistrict']);
    Route::get('/polyclinics/{district_id}', [ApiController::class, 'getPolyclinics']);
    Route::get('/polyclinic/{id}', [ApiController::class, 'getPolyclinic']);
});










