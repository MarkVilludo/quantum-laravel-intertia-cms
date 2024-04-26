<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCourseQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'learning_course_id',
        'difficulty_level_id',
        'duration',
        'question_text',
        'question_type',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer'
    ];
}
