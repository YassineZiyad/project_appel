<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('applications',Api\ApplicationController::class);
Route::apiResource('taches',Api\TacheController::class);
Route::apiResource('users',Api\UserController::class);
Route::apiResource('affectations',Api\AffectationController::class);
Route::get('tachesforapp/{id}',[Api\TacheController::class,'tacheforapp']);


