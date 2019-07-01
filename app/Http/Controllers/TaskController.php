<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $task = new Task();
        $task->inputTitle = $request->inputTitle;
        $task->inputContent = $request->inputContent;
        $task->inputDueDate = $request->inputDueDate;
        if ($request->has('inputFile')) {
            // Get image file
            $image = $request->file('inputFile');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('inputFileName')).'_'.time();
            // Define folder path
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $newName =  $name.".".$image->getClientOriginalExtension();
            // Upload image
            $image->storeAs('public/images',$newName);
            // Set user profile image path in database to filePath
            $task->image = $newName;
        }
        $task->save();
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
    public function update(Request $request, $id){
        $task = task::findOrFail($id);
        $task->inputTitle     = $request->input('inputTitle');
        $task->inputContent    = $request->input('inputContent');
        $task->inputDueDate      = $request->input('inputDueDate');
        if ($request->has('inputFile')) {
            // Get image file
            $image = $request->file('inputFile');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('inputFileName')).'_'.time();
            // Define folder path
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $newName =  $name.".".$image->getClientOriginalExtension();
            // Upload image
            $image->storeAs('public/images',$newName);
            // Set user profile image path in database to filePath
            $task->image = $newName;
        }
        $task->save();
        return redirect()->route('tasks.index');
    }


}
 
