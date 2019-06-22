@extends('layout')


@section('content')
<h1 class="title">Display Projects</h1>

@foreach($projects as $project)
<ul>
    <li>
        <a href="/projects/{{$project->id}}">
            {{$project->project_name}}
        </a>

    </li>
</ul>
@endforeach

<p style="margin-top:2em;">
    <a class="button" href="/projects/create">Create New Project</a>
</p>

@endsection