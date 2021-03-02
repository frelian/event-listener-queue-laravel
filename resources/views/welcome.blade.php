<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">


            <div class="container">
                <div class="row">
                    <div class="jumbotron">
                        <h1 class="display-4">Bienvenido al concurso</h1>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-auto">

                        <h4>Digite su email para iniciar:</h4>
                        <form action="/contest" method="POST">
                            @csrf
                            <input type="text" name="email">
                            <button class="btn btn-primary">Ingresar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
