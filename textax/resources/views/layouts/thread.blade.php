<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>textax</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <main class="bg-white container mx-auto px-4 flex justify-center items-center">
            @yield('content')
        </main>
    </div>
</body>
</html>
