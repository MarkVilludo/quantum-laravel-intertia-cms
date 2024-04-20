<?php

use App\Http\Controllers\{ProfileController, DashboardController};
use App\Http\Controllers\LearningCourseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

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

// Route::get('/learning-modules', function () {
//     return Inertia::render('LearningModule');
// })->middleware(['auth', 'verified'])->name('learning.modules');

// Route::get('/courses/create', function () {
//     return Inertia::render('LearningCourse/CreateCourse');
// })->name('courses.create');


Route::resource('learning-modules', LearningCourseController::class)->middleware(['auth', 'verified'])->names([
    'index' => 'learning.modules',
    'create' => 'learning.modules.create',
    'store' => 'learning.modules.store',
    'edit' => 'learning.modules.edit',
    'update' => 'learning.modules.update',
    'destroy' => 'learning.modules.destroy',
]);

// Route::group(['prefix' => 'learning-modules'], function () {
//     Route::get('/', [LearningCourseController::class, 'index'])->name('learning-modules.index');
//     Route::get('/create', [LearningCourseController::class, 'create'])->name('learning-modules.create');
//     Route::post('/', [LearningCourseController::class, 'store'])->name('learning-modules.store');
//     Route::get('/{learningModule}/edit', [LearningCourseController::class, 'edit'])->name('learning-modules.edit');
//     Route::put('/{learningModule}', [LearningCourseController::class, 'update'])->name('learning-modules.update');
//     Route::delete('/{learningModule}', [LearningCourseController::class, 'destroy'])->name('learning-modules.destroy');
// })->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
