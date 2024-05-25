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
        $newModule = $this->readModule->fill($request->all())->save();
        $data['message'] = 'Successfully saved read module progress.';
        $data['success'] = true;
        return response()->json($data, 200);
    }
}
