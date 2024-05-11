<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCourseModule extends Model
{
    use HasFactory;

    public function activities()
    {
        return $this->hasMany(CourseCategoryActivity::class, 'category_id', 'id');
    }
}
