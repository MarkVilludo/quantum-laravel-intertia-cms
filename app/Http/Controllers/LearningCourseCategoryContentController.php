<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningCourseCategory;
use App\Models\LearningCourseCategoryContent;
use App\Http\Resources\CourseCategoryResource;

class LearningCourseCategoryContentController extends Controller
{
    //
    public function __construct(LearningCourseCategory $category, LearningCourseCategory $categoryContent) {
        $this->category = $category;
        $this->categoryContent = $categoryContent;
    }

    public function categoryDetails($courseId, $categoryId)
    {
        $category = $this->category->where('course_id', $courseId)
                                   ->where('id', $categoryId)
                                   ->with('content')
                                   ->first();
                                   
        $data['data'] = new CourseCategoryResource($category);
        return response()->json($data);
    }
}
