<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'learning_course_id',
        'module_id',
        'level',
        'step'
    ];
}
