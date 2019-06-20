<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();

        return view('projects.index', ['projects'=>$projects]);
        
    }

    public function create()
    {
        
        return view('projects.create');
    }

    public function show(){

    }

    public function edit(int $id){

        $project = Project::findorfail($id);

        return view('projects.edit', ['project'=>$project]);
    }

    public function update(int $id){
        //dd('hello');
        //dd(request()->all());
        $project = Project::findorfail($id);

        $project->project_name = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }

    public function destroy(int $id){
        //dd('Delete ' . $id);
        Project::findorfail($id)->delete();
        return redirect('/projects');
    }
    

    public function store()
    {
        $project = new Project;

        $project->project_name = request( 'title');
        $project->description = request( 'description');

        $project->save();
        
        return redirect('/projects');
    }
   

   

}
