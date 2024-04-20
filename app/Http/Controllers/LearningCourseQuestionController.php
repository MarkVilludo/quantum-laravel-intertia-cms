<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningCourseQuestion;
use App\Http\Resources\LearningCourseQuestionResource;

class LearningCourseQuestionController extends Controller
{
    //
    public function __construct(LearningCourseQuestion $question) {
        $this->question = $question;
    }

    public function index()
    {
        $questions = $this->question->where('learning_course_id', request('learning_course_id'))
                                ->where('difficulty_level_id', request('difficulty_level_id'))
                                ->get();
        
        $data['questions'] = LearningCourseQuestionResource::collection($questions);
        return response()->json($data);
    }
}
