<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentQuestionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Assuming you have some sample course question IDs
        // $courseQuestionIds = [1, 2, 3];
        $answers = [
            // Data for question 1 (course_question_id: 1)
            [
                'course_question_id' => 1,
                'answer' => 'Option 1',
                'is_correct' => false,
            ],
            [
                'course_question_id' => 2,
                'answer' => 'Option 2',
                'is_correct' => true,
            ],
            [
                'course_question_id' => 1,
                'answer' => 'Option 3',
                'is_correct' => false,
            ],

            // Data for question 2 (course_question_id: 2)
            // ... (add similar answer data for question 2)

            // Data for question 3 (course_question_id: 3)
            // ... (add similar answer data for question 3)
        ];

        foreach ($answers as $answerData) {
            DB::table('student_answer_learning_questions')->insert($answerData);
        }
    }
}
