<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SchoolYear extends Model
{
    use HasFactory;

    public function learningCourses() : HasMany
    {
        return $this->hasMany(LearningCourse::class, 'year_id', 'id');
    }
}
