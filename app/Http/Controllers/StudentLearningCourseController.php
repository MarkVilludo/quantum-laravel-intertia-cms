<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadModule;

class StudentLearningCourseController extends Controller
{
    //
    public function __construct(ReadModule $readModule)
    {
        $this->readModule = $readModule;
    }


    public function userCourseProgress()
    {
        return 'test';
    }
}
