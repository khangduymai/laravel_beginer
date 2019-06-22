<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function update(Task $task){
        //dd($task);
        //dd(request()->all());

        if(request()->has('completed')){
            $task->complete();
        }
        else{
            $task->incomplete();
        }

        //another way
        //request()->has('completed') ? $task->complete() : $task->incomplete();

        //another way to use method from Task
        //$method = request()->has('completed') ? 'complete' : 'incomplete';
        //$task->$method;

        //$task->complete(request()->has('completed'));

        //second way to update 
       /*  $task->update([
           'completed' => request()->has('completed') 
        ]); */
        return back();
    }

    public function store(Project $project){

        $atributes=request()->validate([
            'description' => ['required','unique:tasks']
        ]);

        $project ->addTask($atributes);
        /* Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]); */

        return back();
    }
}
