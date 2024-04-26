<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningCourseQuestion;
use App\Http\Resources\LearningCourseQuestionResource;
use App\Http\Requests\QuestionRequest;

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

    public function store(QuestionRequest $request)
    {
        //check exist
        $questionData =  $this->question->where('learning_course_id', request('learning_course_id'))
                                    ->where('difficulty_level_id', request('difficulty_level_id'))
                                    ->where('question_text', request('question_text'))
                                    ->first();

        if (!$questionData) {
            $questionData = $this->question->fill($request->all())->save();
            $data['message'] = 'Successfully saved question.';
        } else {
            $data['message'] = 'Failed, existing record in the database.';
        }
        return response()->json($data);
    }

    public function update(QuestionRequest $request, $questionId)
    {
        //check exist
        $questionData =  $this->question->find($questionId);
        if ($questionData) {
            $questionData->fill($request->all())->update();
            $data['message'] = 'Successfully updated question.';
            $data['success'] = true;
        } else {
            $data['message'] = 'Failed, no record found in the database.';
            $data['success'] = false;
        }
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $question = $this->question->find($id);

        if ($question) {
            $question->delete();
            $data['message'] = 'Successfully deleted question.';
            $data['success'] = true;
        } else {
            $data['message'] = 'Failed, question not found.';
            $data['success'] = false;
        }
        return response()->json($data, 200);
    }
}
