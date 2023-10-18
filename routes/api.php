<?php

use App\Http\Controllers\SurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/',function(){
    return response()->json(['message' => 'Welcome to Survey System API.']);
});


// Route::middleware('auth:sanctum')->get('/auth/logout',[AuthController::class,'logout']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/auth/logout',[AuthController::class,'logout']);
    Route::apiResource('survey',SurveyController::class);
});

Route::group(['prefix' => '/auth'], function() {
    Route::post('/signup', [AuthController::class,'signup']);
    Route::post('/login', [AuthController::class,'login']);
    // Route::get('/logout', [AuthController::class,'logout']);
});