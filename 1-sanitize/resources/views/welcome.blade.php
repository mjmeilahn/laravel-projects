<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meilahn Encryption / Sanitization</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Helvetica', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .content {
                margin-top: 150px;
                text-align: center;
            }

            .inquiry-message {
                background-color: #eaeaea;
                display: none;
                margin: 30px auto;
                max-width: 600px;
                padding: 20px;
            }

            .fa-question-circle {
                background-color: blue;
                border-radius: 50px;
                color: #fff;
                cursor: pointer;
                display: inline-block;
                font-size: 20px;
                margin-left: 5px;
                padding: 2px 4px;
                position: absolute;
                right: 0;
                top: -15px;
            }

            form {
                text-align: center;
            }

            h1 {
                margin: 0 auto;
                max-width: 444px;
                position: relative;
                width: 75%;
            }

            input {
                border: none;
                border-bottom: 3px solid black;
                font-size: 22px;
                max-width: 200px;
                padding: 5px 10px;
                text-align: center;
                transition: .3s all ease-in;
                width: 100%;
            }

            input:focus {
                max-width: 300px;
                outline: none !important;
            }

            button {
                background-color: black;
                bottom: 3px;
                color: white;
                cursor: pointer;
                font-size: 16px;
                margin: 0 auto;
                margin-top: 30px;
                padding: 10px 15px;
                position: relative;
            }

            .output-text {
                margin: 60px 0;
            }
        </style>

        <!-- JS -->
        <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="content">
            <h1>Sanitization & Encryption <i class="fa fa-question-circle" aria-hidden="true"></i></h1>

            <p class="inquiry-message">This example sanitizes any input and encrypts the data - the output passes through an encryption algorithm and the parsed result will be displayed on the page. The encryption method will not be disclosed publicly for posterity reasons.</p>

            @isset ($cleaned)
                <p class="output-text">
                    Sanitized Output: <span>{{ $cleaned }}</span>
                </p>
            @endisset

            @isset ($encryption)
                <p class="output-text">
                    Encrypted Output: <span>{{ $encryption }}</span>
                </p>
            @endisset

            <form action="/request" method="POST" id="sanitize-form">
                {{ csrf_field() }}
                <input type="text" name="data" required="required" />
                <button type="submit">SUBMIT</button>
            </form>
        </div>

        <script type="text/javascript">

            (function($) {

                // Question Icon click
                $('.fa-question-circle').click( e => {
                    $('.inquiry-message').slideToggle(300);
                });

            }(jQuery));

        </script>
    </body>
</html>
