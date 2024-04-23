<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Blog') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- Logi Style -->
    <link rel="stylesheet" href="{{asset('assets/css/register-style.css')}}" />
    <!-- Scripts -->
<body>
    @yield('content')
    <!-- Logi Script -->
    <script src="{{asset('assets/js/register-script.js')}}"></script>
</body>
</html>
