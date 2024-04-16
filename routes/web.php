<?php

use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\LearningCourseController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
