<?php

use App\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task = new Task();
        $task->id               = 1;
        $task->name            = "Công việc 1";
        $task->inputContent          = "Nội dung công việc 1";
        $task->image            = "";
        $task->inputDueDate         = "2018-09-15";
        $task->save();
        $task = new Task();
        $task->id               = 2;
        $task->name            = "Công việc 2";
        $task->inputContent          = "Nội dung công việc 2";
        $task->image            = "";
        $task->inputDueDate         = "2018-09-16";
        $task->save();
        $task = new Task();
        $task->id               = 3;
        $task->name            = "Công việc 3";
        $task->inputContent          = "Nội dung công việc 3";
        $task->image            = "";
        $task->inputDueDate         = "2018-09-17";
        $task->save();
        }
    }
