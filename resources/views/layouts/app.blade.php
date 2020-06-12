<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

     @yield('scripts')

</head>
<body class="">
    <div id="preloader">
        <div class='preloader'>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="app">
        {{-- <header class="header w-screen p-4 shadow h-20">
            <nav class="container mx-auto px-8 flex items-center">
                <span class="logo-site font-bold text-3xl">RVM</span>
            </nav>
        </header> --}}
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/wow/dist/wow.min.js') }}" defer></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>
</html>
