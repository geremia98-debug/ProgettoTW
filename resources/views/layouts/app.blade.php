<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <h1> inizio app</h1>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">  
    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}" defer> </script>


  

</head>
<header>
    @include('partials.navbar')
</header>
<main>
    @yield('content')
</main>
<footer>
    @include('partials.footer')
</footer>

</html>
