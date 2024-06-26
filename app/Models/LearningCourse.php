<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_id',
        'title',
        'description'
    ];

    public function modules()
    {
        return $this->hasMany(LearningCourseModule::class, 'course_id', 'id');
    }
}
