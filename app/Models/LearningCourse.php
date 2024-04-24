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

    public function categories()
    {
        return $this->hasMany(LearningCourseCategory::class, 'course_id', 'id');
    }
}
