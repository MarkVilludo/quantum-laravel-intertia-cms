<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReadModuleRequest;
use App\Models\ReadModule;

class ReadModuleController extends Controller
{
    public function __construct(ReadModule $readModule)
    {
        $this->readModule = $readModule;
    }
    //
    public function readModule(ReadModuleRequest $request)
    {
        //save reading progress of user per course module
        // check exist before to save

        $isRead = $this->readModule->where('user_id', request('user_id'))
                                    ->where('learning_course_id', request('learning_course_id'))
                                    ->where('module_id', request('module_id'))
                                    ->where('step', request('step'))
                                    ->where('level', request('level'))
                                    ->first();

        if (!$isRead) {
            $newModule = $this->readModule->fill($request->all())->save();
            $data['message'] = 'Successfully saved read module progress.';
            $data['success'] = true;
        } else {
            $data['message'] = 'Failed, already saved the module progress';
            $data['success'] = true;
        }

       
        return response()->json($data, 200);
    }
}
