<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>کارگاه آموزشی</title>


    <link rel="stylesheet" href="/css/app.css">

    <!-- Fonts -->

</head>
<body>
<div id="client">
    <header>
        @include('layouts.client.header')
    </header>
    <div>
        @yield('clientcontent')
    </div>
    <footer>
        @include('layouts.client.footer')
    </footer>
</div>
</body>

<script src="/js/client.js"></script>

</html>
