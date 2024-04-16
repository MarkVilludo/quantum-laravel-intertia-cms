<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    //
    public function __construct(SchoolYear $schoolYear) {
        $this->schoolYear = $schoolYear;
    }

    public function index()
    {
        
    }
}
