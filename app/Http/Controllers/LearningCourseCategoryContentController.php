<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningCourseModule;
use App\Http\Resources\CourseCategoryResource;

class LearningCourseCategoryContentController extends Controller
{
    //
    public function __construct(LearningCourseModule $category, LearningCourseModule $categoryContent) {
        $this->category = $category;
        $this->categoryContent = $categoryContent;
    }

    public function categoryDetails($courseId, $categoryId)
    {
        return $category = $this->category->where('course_id', $courseId)
                                   ->where('id', $categoryId)
                                   ->with('activities')
                                   ->first();
                                   
        $data['data'] = new CourseCategoryResource($category);
        return response()->json($data);
    }
}
