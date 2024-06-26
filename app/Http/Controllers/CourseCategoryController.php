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
        return Inertia::render('CourseModule/Create',
        [
            'course_id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'content' => 'required',
            'step' => 'required',
        ]);
        // return 'test';

        $category = new LearningCourseModule($request->all());
        $category->name = $request->name;
        $category->description = $request->description;
        $category->content = $request->content;
        $category->step = $request->step;
        $category->course_id = $request->course_id;
        $category->save();

        return redirect()->route('learning.courses');
    }

    public function edit($moduleId)
    {
        // return 'test';
        $learningModule = LearningCourseModule::where('id', $moduleId)->first();
        return Inertia::render('CourseModule/Edit', 
            [
                'module' => $learningModule,
                'isUpdating' => true
            ]
        );
    }

    public function show($id)
    {
        $data['module'] = $this->category->find($id);
        return view('modules.show', $data);
        // return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $learningModule = LearningCourseModule::find($id);
            $learningModule->update($request->all());
            $message = 'Successfully updated record.';
            $status = true;
        } catch (\Throwable $th) {
            $message = $th;
            $status = false;
        }
        return Inertia::render('CourseModule/Edit', 
            [
                'module' => $learningModule,
                'isUpdating' => true,
                'message' => $message,
                'success' => $status,
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
