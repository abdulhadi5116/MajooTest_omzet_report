<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
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
                font-size: 36px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title">
                    <div class="container-fluid">

                    <!-- 404 Error Text -->
                        <div class="text-center">
                            <div class="error mx-auto" data-text="404">404</div>
                            <p class="text-gray-500 mb-0 ">Page Not Found</p>
                            <p class="lead text-gray-800 mb-5">It looks like you found a glitch in the matrix...</p>
                            <a href="{{ route('home') }}" class="lead text-blue-800 mb-4">&larr; Back to Dashboard</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __($exception->getMessage() ?: 'Not Found'))
