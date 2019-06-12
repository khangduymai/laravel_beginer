<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Books</title>

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
                    Book
                </div>

                <input type='number' placeholder='Please enter book ID' id='book-id-input'>

                <p id='book-id'></p>
                <p id='title'></p>
                <p id='author'></p>
            </div>
        </div>

        <script>
            document.getElementById("book-id-input").addEventListener("change", loadBook);
            
            function loadBook() {
                bookId = document.getElementById("book-id-input").value;

                var request = new XMLHttpRequest();

                //  call back
                request.onreadystatechange = function() { // then this line run after request.send
                    if (this.readyState == 4 && this.status == 200) { // check if condition
                        jsonResponse = JSON.parse(this.responseText);

                        // console.log('Response text: ' + this.responseText);
                        // console.log('Json Response: '); console.log(jsonResponse);

                        document.getElementById("book-id").innerHTML = 'Book ID: ' + jsonResponse.id;
                        document.getElementById("title").innerHTML = 'Book Title: ' + jsonResponse.title;
                        document.getElementById("author").innerHTML = 'Book Author: ' + jsonResponse.author;
                    } 
                    else if (this.status == 500 || this.status == 404) {
                        document.getElementById("book-id").innerHTML = 'ERROR - not found';
                        document.getElementById("title").innerHTML = '';
                        document.getElementById("author").innerHTML = '';
                    }
                };

                request.open("GET", "/api/book/" + bookId, true); // this line run last
                request.send(); //This code line run first
            }
        </script>
    </body>
</html>
