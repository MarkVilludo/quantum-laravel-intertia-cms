<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LearningCourseQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Assuming you have some sample learning_course_id values
        $courseIds = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5];

        $questions = [
            [
                'learning_course_id' => $courseIds[0], // Replace with actual course ID
                'question_text' => 'What is the basic unit of data storage in a computer?',
                'question_type' => 'multiple_choice',
                'option_a' => 'Byte',
                'option_b' => 'Kilobyte',
                'option_c' => 'Megabyte',
                'option_d' => 'All of the above',
                'correct_answer' => 'd',
            ],
            [
                'learning_course_id' => $courseIds[1], // Replace with actual course ID
                'question_text' => 'What does HTML stand for?',
                'question_type' => 'multiple_choice',
                'option_a' => 'Hypertext Markup Language',
                'option_b' => 'High Tech Markup Language',
                'option_c' => 'Hyperlink Text Markup Language',
                'option_d' => 'None of the above',
                'correct_answer' => 'a',
            ],
            [
                'learning_course_id' => $courseIds[2], // Replace with actual course ID
                'question_text' => 'What is the purpose of a semicolon (;) in JavaScript?',
                'question_type' => 'multiple_choice',
                'option_a' => 'To create a new line',
                'option_b' => 'To define a variable',
                'option_c' => 'To separate code statements',
                'option_d' => 'To comment out code',
                'correct_answer' => 'c',
            ],
            [
                'learning_course_id' => $courseIds[3], // Replace with actual course ID
                'question_text' => 'Explain the concept of a relational database.',
                'question_type' => 'open_ended', // No answer options for open ended questions
                'correct_answer' => 'a',
            ],
            [
                'learning_course_id' => $courseIds[4], // Replace with actual course ID
                'question_text' => 'What are the four Ps of marketing?',
                'question_type' => 'multiple_choice',
                'option_a' => 'Price, Place, Promotion, Product',
                'option_b' => 'People, Process, Price, Promotion',
                'option_c' => 'Planning, Positioning, Promotion, Placement',
                'option_d' => 'Product, Price, People, Promotion',
                'correct_answer' => 'a',
            ],
            [
                'learning_course_id' => $courseIds[5], // Replace with actual course ID
                'question_text' => 'What is the difference between SEO and SEM?',
                'question_type' => 'open_ended',
                'correct_answer' => "b",
            ],
            [
                'learning_course_id' => $courseIds[6], // Replace with actual course ID
                'question_text' => 'Identify the basic components of a graphic design software.',
                'question_type' => 'multiple_choice',
                'option_a' => 'Toolbars, Palettes, Layers',
                'option_b' => 'Menus, Canvases, Filters',
                'option_c' => 'Brushes, Fonts, Shapes',
                'option_d' => 'All of the above',
                'correct_answer' => 'd',
            ],
            [
                'learning_course_id' => $courseIds[7], // Replace with actual course ID
                'question_text' => 'What is the role of color theory in design?',
                'question_type' => 'open_ended',
                'correct_answer' => 'b'
            ]
        ];

        foreach ($questions as $question) {
            DB::table('learning_course_questions')->insert($question);
        }
    }
}
