<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningCourseCategory;
use App\Http\Resources\CategoryIndexResource;

class CourseCategoryController extends Controller
{
    //
    public function __construct(LearningCourseCategory $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->where('course_id', request('course_id'))
                                        ->orderBy('step', 'asc')
                                        ->get();

        $data['data'] = CategoryIndexResource::collection($categories);
        return response()->json($data, 200);
    }
}
