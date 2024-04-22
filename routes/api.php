<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LearningCourseQuestionController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('v1/register', [AuthController::class, 'register']);

Route::post('v1/login', [AuthController::class, 'login']);
Route::get('v1/profile', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::get('/v1/questions', [LearningCourseQuestionController::class, 'index']);




// // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// //     return $request->user();
// });
// Route::post('/register', [AuthController::class, 'register']);

// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/profile', [AuthController::class, 'me'])->middleware('auth:sanctum');
