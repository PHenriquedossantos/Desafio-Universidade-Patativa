<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('Patativa')</title>
        <link rel="stylesheet" href="/css/form.css">
        @yield('styles')
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        @yield('content')
        <footer>

        </footer>

    </body>
</html>
