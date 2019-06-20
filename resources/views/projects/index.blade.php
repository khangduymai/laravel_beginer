<!DOCTYPE html>
<html>

<head>
    <title>Display Index</title>
</head>

<body>
    <h1>List of Projects</h1>

    @foreach($projects as $project)
    <li>{{$project->project_name}}</li>
    @endforeach


</body>

</html>