<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    @include('client.layouts.header')
    <main>
        <div id="app">
            @yield('content')
        </div>
    </main>
    @include('client.layouts.footer')
    @vite('resources/js/app.js')
</body>
</html>