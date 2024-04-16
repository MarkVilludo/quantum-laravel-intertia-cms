<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{LearningCourse, SchoolYear};
use Inertia\Inertia;

class LearningCourseController extends Controller
{
    //
    public function __construct(LearningCourse $learningCourse) {
        $this->learningCourse = $learningCourse;
    }

    public function index()
    {
        $learningCourses = LearningCourse::all();
        $data['schoolYear'] = SchoolYear::with('learningCourses')->get();
        return Inertia::render('LearningModule', $data);
    }
}
