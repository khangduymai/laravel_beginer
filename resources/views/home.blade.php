<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shipping Program</title>

        
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

            .input{
                font-size: 40px;
                margin-bottom: 30px;
            }

            .form-check-label{
                font-size: 25px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    Welcome to Shipping Program
                </div>

                <div class="input">
                    <form action="/shippingPrice" method="GET">
                        <div class="form-group">
                            <label for="CustomerName">Customer Name</label>
                            <input type="text" class="form-control" name="customerName" id="CustomerName">
                        </div>
                        <div class="form-group">
                            <label for="weight">Package Weight:</label>
                            <input type="text" class="form-control" name="weight" id="weight">
                        </div>
                        <h2>Options</h2>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" name="options[]" type="checkbox" value="Overnight Shipping"> Overnight Shipping
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" name="options[]" type="checkbox" value="Two-day Shipping"> Two-day Shipping
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" name="options[]" type="checkbox" value="Insurrane"> Insurrane
                            </label>
                        </div>
                        <input type="submit" name="submit" value="Click to submit" class="btn btn-primary btn-group-lg">
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
