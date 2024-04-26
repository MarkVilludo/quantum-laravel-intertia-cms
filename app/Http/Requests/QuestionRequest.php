<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'learning_course_id' => 'required',
            'difficulty_level_id' => 'required',
            'duration' => 'required',
            'question_text' => 'required',
            'question_type' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'nullable',
            'option_d' => 'nullable',
            'correct_answer' => 'required'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json(['errors' => $validator->errors()], 422);
        
        throw new HttpResponseException($response);
    }
}
