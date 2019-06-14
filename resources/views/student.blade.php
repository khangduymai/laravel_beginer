<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Students Information</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }


            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           
            <div class="content">
                <div class="title m-b-md">
                    Student Information
                </div>

                <input type='number' placeholder='Student ID' id='student-id-input'>

                <p id='student-id'></p>
                <p id='student-name'></p>
                <p id='student-email'></p>
                <p id='student-phone'></p>
                <div id='student-projects'></div>    
                <!-- <table style="width: 100%" id='student-projects'></table> -->
                
            </div>
        </div>

        <script>

           /*  function callAlert() {
                alert(document.getElementById('student-id-input').value);
            }

            // callback:
            callAlert is a function object without ()
            document.getElementById('student-id-input').addEventListener(
                "keyup", 
                callAlert
            );   */
             
            



            document.getElementById('student-id-input').addEventListener("change", loadStudent);

            function loadStudent() {

                var studentID = document.getElementById('student-id-input').value;

                var request = new XMLHttpRequest();
                var x ='';

                request.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let student = JSON.parse(this.responseText);

                    document.getElementById("student-id").innerHTML = 'Student ID: ' + student.id;
                    document.getElementById("student-name").innerHTML = 'Student name: ' + student.name;
                    document.getElementById("student-email").innerHTML = 'Student email: ' + student.email;
                    document.getElementById("student-phone").innerHTML = 'Student phone: ' + student.phone;

                    let projects = student.projects;

                    let tableString = '<table width="100%">';
                    tableString += '<tr><th align="left">Project ID</th><th align="left">Project Name</th></tr>'
                    for (let i = 0; i < projects.length; i++) {
                        tableString += '<tr>';
                        tableString += '<td align="left" width="30%">' + 'Project ' + projects[i].projectID  + '</td>';
                        tableString += '<td align="left">' + projects[i].projectName + '</td>';
                        tableString += '</tr>';
                    }
                    tableString += '</table>';

                    console.log(tableString);

                    document.getElementById("student-projects").innerHTML = tableString;

                    //testing
                    //table.innerHTML = '<table width="100%"><tr><td>hello</td></tr></table>';


                   /* for(i = 0; i<jsonResponse.projects.length; i++){
                        
                        for(var property in jsonResponse.projects[i]){
                            document.getElementById("student-project").innerHTML += jsonResponse.projects[i][property]+"<br>" ;
                            //document.getElementById("student-project").innerHTML = jsonResponse.projects[i][x]+"<br>";
                        }
        
                    } */  

                }
                };
                
                //console.log("/api/student/" + studentID);

            request.open("GET", "/api/student/" + studentID , true);

            request.send(); 
            }
        </script>
    </body>
</html>
