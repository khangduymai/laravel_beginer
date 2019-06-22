<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', ['projects' => $projects]);
    }

    public function create()
    {

        return view('projects.create');
    }

    public function show(int $id)
    {
        $project = Project::findorfail($id);
        return view('projects.show', ['project' => $project]);
    }

    public function edit(int $id)
    {

        $project = Project::findorfail($id);

        return view('projects.edit', ['project' => $project]);
    }

    public function update(int $id)
    {
        //dd('hello');
        //dd(request()->all());
        $project = Project::findorfail($id);

        $project->project_name = request('title');
        $project->description = request('description');

        $project->save();

        return redirect('/projects');
    }

    public function destroy(int $id)
    {
        //dd('Delete ' . $id);
        Project::findorfail($id)->delete();
        return redirect('/projects');
    }


    public function store()
    {
        //this method has to use protected guard() in model
        //Project::create(request(['title', 'description']));

        //dd(request(['title', 'description']));

        
 

        request()->validate([
            //the 'title' and 'description' is from the name of the input in view
            //anything that has errors will return to variable $errors
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        Project::create([
            'project_name'=>request('title'),
            'description'=>request('description')
        ]);
 
        

        /* Project::create(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ])); 
        */

        /*  
        //Another way to insert data to database using model

        $project = new Project;

        $project->project_name = request( 'title');
        $project->description = request( 'description'); 

        $project->save();
        */

        return redirect('/projects');
    }
}
