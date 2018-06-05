<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meilahn CRON</title>

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
                padding: 15px;
                text-align: center;
            }

            h1 {
                margin: 0 auto;
                max-width: 200px;
                position: relative;
                width: 75%;
            }

            h2 {
                margin: 0 auto;
                margin-top: 30px;
                max-width: 500px;
                text-align: left;
            }

            .inquiry-message {
                background-color: #eaeaea;
                display: none;
                margin: 30px auto;
                max-width: 600px;
                padding: 20px;
            }

            .inquiry-message span:first-child {
                display: block;
                margin-bottom: 30px;
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
        </style>

        <!-- JS -->
        <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
    </head>
    <body>
        <section class="content">
            <h1>Basic CRON <i class="fa fa-question-circle" aria-hidden="true"></i></h1>

            <p class="inquiry-message">
                <span>This example retrieves a list of the ten most recent Date & Time entries from a database.</span>
                <span>This CRON will run at 10-minute intervals - removes the oldest 10th entry in a database, and saves the latest date & time.</span>
            </p>
            
            @isset ($entries)
                <h2>Entries:</h2>
                <div class="cron-entries-container">
                    @foreach ($entries as $entry)
                        <div class="entry-container">
                            <p>{{ $entry }}</p>
                        </div>
                    @endforeach
                </div>
            @endisset
        </section>

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
