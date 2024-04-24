<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCourseCategory extends Model
{
    use HasFactory;

    public function content()
    {
        return $this->belongsTo(LearningCourseCategoryContent::class, 'id', 'category_id');
    }
}
