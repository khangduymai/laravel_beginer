<!DOCTYPE html>
<html>

<head>
    <h1>DISPLAY</h1>
</head>

<body>
    @foreach($projects as $project)
    <li>{{$project->project_name}}</li>
    @endforeach


</body>

</html>