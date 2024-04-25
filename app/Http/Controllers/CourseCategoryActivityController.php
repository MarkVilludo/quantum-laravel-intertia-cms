<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseCategoryActivity;
use App\Http\Requests\CourseActivityRequest;

class CourseCategoryActivityController extends Controller
{
    //
    public function __construct(CourseCategoryActivity $activity)
    {
        $this->activity = $activity;
    }

    public function store(CourseActivityRequest $request)
    {
        $activity = new $this->activity(request()->all());
        $activity->save();

        $data['message'] = 'Successfully saved activity.';
        $data['success'] = true;
        return response()->json($data);
    }
}
