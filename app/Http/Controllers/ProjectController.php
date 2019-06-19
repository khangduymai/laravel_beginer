<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();

        return view('index', ['projects'=>$projects]);
        //return view('index');
    }

    public function store()
    {
        $project = new Project;

        $project->project_name = request( 'title');
        $project->description = request( 'description');

        $project->save();
        
        return redirect('/');
    }
   

    public function create(){

        return view('create');
    }

}
