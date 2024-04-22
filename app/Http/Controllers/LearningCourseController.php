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
        $data['message'] = '';
        $data['schoolYear'] = SchoolYear::with('learningCourses')->get();
        return Inertia::render('LearningCourse/Index', $data);
    }
    public function create()
    {
        return Inertia::render('LearningCourse/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);
        $learningCourse = new LearningCourse($request->all());
        $learningCourse->save();

        session()->flash('success', 'Learning course created successfully!');
        // Redirect back to the create page with a flash message (optional)
        return redirect()->route('learning.modules');
    }

    public function edit($id)
    {
        $learningCourse = LearningCourse::find($id);
        return Inertia::render('LearningCourse/Edit', ['learning_course' => $learningCourse, 'isUpdating' => true]);
    }

    public function update(Request $request, $id)
    {
        $learningCourse = LearningCourse::find($id);
        $learningCourse->update($request->all());
        return redirect()->route('learning.modules');
    }

    public function destroy($id)
    {
        $learningCourse = LearningCourse::find($id);
        $learningCourse->delete();

        session()->flash('success', 'Learning course created successfully!');
        // Redirect back to the create page with a flash message (optional)
        return redirect()->route('learning.modules');
    }
}
