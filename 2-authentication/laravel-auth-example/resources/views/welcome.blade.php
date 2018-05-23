<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meilahn Auth Example</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

        <style type="text/css">
            /* Mobile first CSS */

            .insta-modal-container,
            .overlay-site-wrapper,
            .result-caption,
            .inquiry-message {
                display: none;
            }

            body {
                background-color: #fff;
                font-family: helvetica;
            }

            .page-container {
                margin: 0 auto;
                margin-top: 80px;
                max-width: 90%;
            }

            .intro-container {
                margin-bottom: 30px;
                max-width: 440px;
                position: relative;
            }

            .fa {
                color: #000;
                cursor: pointer;
                font-size: 18px;
            }

            h1 {
                display: inline;
                margin-bottom: 30px;
                vertical-align: top;
            }

            .inquiry-message {
                background-color: #eaeaea;
                margin: 30px 0;
                padding: 20px;
            }

            .fa-question-circle {
                background-color: blue;
                border-radius: 50px;
                bottom: 5px;
                color: #fff;
                display: inline-block;
                margin-left: 5px;
                padding: 2px 4px;
            }

            p {
                margin-bottom: 10px;
            }

            input {
                border: 1px solid #000;
                padding: 10px;
                padding-right: 0;
            }

            button {
                background-color: #000;
                color: #fff;
                cursor: pointer;
                padding: 10px;
            }

            #instagramFetch {
                margin-top: 30px;
            }

            .results-container {
                align-items: flex-start;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                margin: 80px auto;
                max-width: 780px;
                width: 100%;
            }

            .result-container {
                cursor: pointer;
                margin: 10px;
                transform: scale(0,0);
                transition: .3s all ease-in;
            }

            .result-container.active {
                transform: scale(1, 1);
            }

            .message-container {
                margin: 50px 0;
                margin-bottom: 150px;
                text-align: center;
            }

            .overlay-site-wrapper {
                background-color: rgba(0,0,0,.7);
                bottom: 0;
                height: 100%;
                left: 0;
                position: fixed;
                right: 0;
                top: 0;
                width: 100%;
                z-index: 3;
            }

            .insta-modal-container {
                left: 5px;
                margin: 0 auto;
                max-width: 900px;
                position: fixed;
                right: 5px;
                text-align: center;
                top: 10%;
                width: 90%;
                z-index: 4;
            }

            .modal-content-container {
                background-color: #fff;
            }

            .modal-image-col img {
                display: block;
            }

            .modal-text-col {
                line-height: 1.3;
                padding: 15px;
            }

            .modal-share-container {
                align-items: flex-start;
                display: flex;
                justify-content: center;
                margin-top: 15px;
            }

            .modal-share-container a {
                margin: 10px;
            }

            .modal-close-icon .fa {
                color: #fff;
                position: absolute;
                right: 0;
                top: -30px;
            }

            /* Tablet */
            @media only screen and (min-width: 768px) {

                .fa-question-circle {
                    margin: 0;
                    padding: 2px 4px;
                }

                .insta-modal-container {
                    top: 15%;
                }

                .modal-content-container {
                    align-items: flex-start;
                    display: flex;
                    justify-content: space-between;
                }

                .modal-image-col {
                    max-width: 600px;
                    width: 50%;
                }

                .modal-text-col {
                    padding: 50px 15px;
                    width: 50%;
                }

                .modal-share-container {
                    margin-top: 30px;
                }

                .modal-close-icon .fa {
                    color: #000;
                    position: absolute;
                    right: 10px;
                    top: 10px;
                }
            }
        </style>

        <!-- JS -->
        <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  
    </head>
    <body>
        <section class="page-container">
            <div class="intro-container">
                <h1>Authenticated Instagram App <i class="fa fa-question-circle" aria-hidden="true"></i></h1>
                <p class="inquiry-message">This example has enabled best practices using <strong>explicit</strong> authentication with Instagram's API. This is done by sending a POST request to a general URL with Authenticated data from Instagram - a callback is sent back with an access token.</p>
            </div>

            <div class="results-container">
                @foreach ($results as $result)
                    <div class="result-container">
                        <img id="{{ $result->id }}" src="{{ $result->images->standard_resolution->url }}" class="result-image" width="240" height="240">
                        <span class="result-caption"></span>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- View Modal -->
        <div class="overlay-site-wrapper"></div>
        <section class="insta-modal-container">
            <div class="modal-content-container">
                <div class="modal-image-col"></div>
                <div class="modal-text-col">
                    <div class="modal-text-container">
                        <p class="modal-text"></p>
                        <a class="insta-link" href=""></a>
                    </div>
                    <div class="modal-share-container">
                        <a class="modal-facebook" href="#">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a class="modal-twitter" href="#">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a class="modal-pinterest" href="#">
                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                        <a class="modal-mailto" href="#">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </a>
                        <a class="modal-sharelink" href="#">
                            <i class="fa fa-link" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <span class="modal-close-icon" data-close-modal>
                <i class="fa fa-times" aria-hidden="true"></i>
            </span>
        </section>


        <script type="text/javascript">

            (function($) {

                // Question Icon click
                $('.fa-question-circle').click( e => {
                    $('.inquiry-message').slideToggle(300);
                });


                // Instagram image click opens modal
                $(document).on('click', '.result-container', e => {
                    // Empty everthing before populating request
                    $('.modal-image-col').html('');
                    $('.modal-text').text('');

                    let $this = $(e.currentTarget);
                    let ID = $this.find('img').attr('id');
                    let $imgClone = $(`img[id=${ ID }]`).clone();
                    let captionText = $this.find('.result-caption').text();

                    // Adjust CSS dimensions on cloned image
                    $imgClone = $imgClone.css({'height':'auto', 'width':'100%'});

                    // Populate the modal 
                    $('.modal-image-col').html($imgClone);
                    $('.modal-text').text(captionText);

                    // Open modal
                    $('.overlay-site-wrapper, .insta-modal-container').fadeIn(300);
                });


                // Close modal
                $('.overlay-site-wrapper, [data-close-modal]').click( e => {
                    $('.insta-modal-container, .overlay-site-wrapper').fadeOut(300);
                });


                // On load, add animation class to images
                $(window).load( e => {
                    $('.result-container').addClass('active');
                });


            }(jQuery));

        </script>
    </body>
</html>
