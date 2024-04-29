<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dani’s Catering and Events</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-yellow-300">
    <div id="app">
        @include('layouts.public.navbar')
        
        @yield('content')
    </div>
</body>

</html>