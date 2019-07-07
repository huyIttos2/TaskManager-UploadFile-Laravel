<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{


    public function index()
    {
        $tasks = Task::all();
        return view('list', compact('tasks'));
    }

    public function create()
    {
        return view('add');
    }

    public function store(TaskRequest $request)
    {
        $task = new Task();
        $task->name = $request->inputTitle;
        $task->inputContent = $request->inputContent;
        $task->inputDueDate = $request->inputDueDate;
        if ($request->has('inputFile')) {
            $image = $request->file('inputFile');
            $name = str_slug($request->input('inputFileName')).'_'.time();
            $newName =  $name.".".$image->getClientOriginalExtension();
            // Upload image
            $image->storeAs('public/images',$newName);
            // Set user profile image path in database to filePath
            $task->image = $newName;
        }
        $validated = $request->validated();
        $task->save();
        $success = "Dữ liệu được xác thực thành công";
        return redirect()->route('tasks.index');

    }
    public function delete($id){
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
    public function edit($id){
        $task = Task::findOrFail($id);
        return view('edit', compact('task'));
    }
    public function update(TaskRequest $request, $id){
        $task = task::findOrFail($id);
        $task->name     = $request->input('inputTitle');
        $task->inputContent    = $request->input('inputContent');
        $task->inputDueDate      = $request->input('inputDueDate');
        $currentImage = $task->image;
        if($currentImage){
            $isImageExist = Storage::exists('/public/images'.$currentImage);
            if($isImageExist){
                Storage::delete('/public/images'.$currentImage);
            }
        }
        if ($request->has('inputFile')) {
            // Get image file
            $image = $request->file('inputFile');
            $name = str_slug($request->input('inputFileName')).'_'.time();
            $newName =  $name.".".$image->getClientOriginalExtension();
            $image->storeAs('public/images',$newName);
            $task->image = $newName;
        }
        $task->save();
        return redirect()->route('tasks.index');
    }



}
 
