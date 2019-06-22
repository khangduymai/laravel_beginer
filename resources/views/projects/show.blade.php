@extends('layout')


@section('content')
<h1 class="title">{{$project->project_name}}</h1>

<div class="content">
    {{$project->description}}

    <p style="margin-top:1em;">
        <a href="/projects/{{$project->id}}/edit">Edit Project</a>
    </p>
</div>


@if ($project->tasks->count())
<div>
    <h1 class="title is-5">Tasks of the project</h1>


    @foreach ($project->tasks as $task)
    <ul>
        <li>
            <form method="POST" action="/tasks/{{ $task->id }}">
                @method('PATCH')
                @csrf
                <label class="checkbox {{ $task->completed ? 'is-complete': ''}}" for="completed">
                    <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked': ''}}>
                    {{ $task->description }}
                </label>
            </form>
        </li>
    </ul>
    @endforeach
</div>
@endif

<div style="margin-top: 1.5em;">
    <form method="POST" action="/projects/{{ $project->id }}/tasks">
        @csrf
        <div class="field">
            <label class="label" for="description">New Task</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('description') ? 'is-danger' : ''}}" name="description" placeholder="New Task" value="{{old('description')}}" required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
    </form>
</div>

@include('errors')


<p style="margin-top:2em;">
    <a class="button" href="/projects">Return To List Of Project</a>
</p>

@endsection