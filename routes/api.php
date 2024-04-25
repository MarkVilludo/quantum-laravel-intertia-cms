<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LearningCourseQuestionController, LearningCourseController};
use App\Http\Controllers\{LearningCourseCategoryContentController, CourseCategoryActivityController};
use App\Http\Controllers\{CourseCategoryController};

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

// Group routes with prefix "v1/api"
Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('profile', [AuthController::class, 'me'])->middleware('auth:sanctum');
    Route::get('questions', [LearningCourseQuestionController::class, 'index']);

    Route::get('courses', [LearningCourseController::class, 'list']);
    Route::get('courses/{id}', [LearningCourseController::class, 'show']);
    Route::prefix('courses/{id}/categories/{catId}')->group(function () {
        Route::get('/', [LearningCourseCategoryContentController::class, 'categoryDetails']);
        //category activity crud
        Route::post('activities', [CourseCategoryActivityController::class, 'store']);
    });

    Route::get('categories', [CourseCategoryController::class, 'index']);
});

// Route::get('/profile', [AuthController::class, 'me'])->middleware('auth:sanctum');
