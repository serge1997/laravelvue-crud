<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <!-- Styles -->
       @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased">
       <div id="app">

        
       </div>
       
       <script scr="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
       @vite(['resources/js/app.js'])
    </body>
</html>
