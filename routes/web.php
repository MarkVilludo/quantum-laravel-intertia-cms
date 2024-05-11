<?php

use App\Http\Controllers\{ProfileController, DashboardController};
use App\Http\Controllers\{LearningCourseController, CourseCategoryController};
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/learning-courses', function () {
//     return Inertia::render('LearningModule');
// })->middleware(['auth', 'verified'])->name('learning.modules');

// Route::get('/courses/create', function () {
//     return Inertia::render('LearningCourse/CreateCourse');
// })->name('courses.create');


Route::resource('learning-courses', LearningCourseController::class)->middleware(['auth', 'verified'])->names([
    'index' => 'learning.courses',
    'create' => 'learning.courses.create',
    'store' => 'learning.courses.store',
    'edit' => 'learning.courses.edit',
    'update' => 'learning.courses.update',
    'destroy' => 'learning.courses.destroy',
]);

Route::group(['prefix' => 'learning-modules'], function () {
    Route::get('/', [CourseCategoryController::class, 'index'])->name('learning-modules.index');
    // Route::get('{courseId}/create', [CourseCategoryController::class, 'create'])->name('learning-modules.create');
    Route::post('/', [CourseCategoryController::class, 'store'])->name('learning-modules.store');
    Route::get('/{moduleId}/edit', [CourseCategoryController::class, 'edit'])->name('learning-modules.edit');
    Route::put('/{moduleId}', [CourseCategoryController::class, 'update'])->name('learning-modules.update');
})->middleware(['auth', 'verified']);
Route::get('learning-courses/{courseId}/modules/create', [CourseCategoryController::class, 'create'])->name('learning-modules.create');
Route::delete('learning-courses/{courseId}/learning-modules/{moduleId}', [CourseCategoryController::class, 'destroy'])->name('learning-modules.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
