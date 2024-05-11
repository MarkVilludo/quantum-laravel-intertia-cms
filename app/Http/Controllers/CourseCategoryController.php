<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningCourseModule;
use App\Http\Resources\CategoryIndexResource;
use Inertia\Inertia;

class CourseCategoryController extends Controller
{
    //
    public function __construct(LearningCourseModule $category)
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

    public function create($id = null)
    {
        return Inertia::render('CourseModule/Create');
    }

    public function edit($id)
    {
        $learningModule = LearningCourseModule::where('id', $id)->first();
        return Inertia::render('LearningModule/Edit', 
            [
                'learning_course' => $learningModule,
                'isUpdating' => true
            ]
        );
    }

    public function destroy($courseId, $moduleId)
    {
        $module = LearningCourseModule::find($moduleId);
        $module->delete();

        session()->flash('success', 'Learning module deleted successfully!');
        // Redirect back to the create page with a flash message (optional)
        return redirect()->route('learning.courses.edit', $courseId);
    }
}
