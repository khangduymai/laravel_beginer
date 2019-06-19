<!DOCTYPE html>
<html>

<head>
    <title>Create Project</title>

</head>

<body>

    <h1>Create Simple Project</h1>

    <form method="POST" action="/">
            {{csrf_field()}}


        <div>
            <input type="text" name="title" placeholder="Project Title">
        </div>

        <div>
            <textarea name="description" placeholder="Project Description"></textarea>
        </div>

        <div>
            <button type="submit">Create Project</button>
        </div>

    </form>



</body>

</html>