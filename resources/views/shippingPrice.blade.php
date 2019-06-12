<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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

            
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

        

            .m-b-md {
                margin-bottom: 30px;
            }

            .result {
                font-size: 40px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    Your Grade Result 
                </div>

                <div class="result">
                    <p> Your name is: {{ $name }} </p>
                    <p> Your package weight is: {{ $weight }} </p>
                    <p> Special services: </p>
                    <ul>
                        
                        @foreach($options as $option)
                             <li> {{$option}}</li>
                        @endforeach
                
                    </ul>
                    
                   
                </div>  

            </div>
        </div>
    </body>
</html>
