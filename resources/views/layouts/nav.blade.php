<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
         <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container ">
                <a class="navbar-brand" >
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto dropdown">
                        @if( auth()->user())
                        <li>
                            <div class="dropdown mr-1 small ">
                                  <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    INICIO 
                                  </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="/" class="dropdown-item">
                                                INICIO 
                                            <a>
                                            <a  href="{{ route('questions')}}"  class="dropdown-item">
                                                Crear Test
                                            </a>
                                            <a href="{{ route('readings')}}" class="dropdown-item">
                                                Crear Lecturas
                                            </a>
                                      </div>
                            </div>
                            
                        </li>
                       
                            <li class="mt-2">
                                <p>{{ auth()->user()->name }}</p>   
                            </li>
                        @else
                            <li class="mt-2">
                                <a href="{{ route('login') }}">Entrar</a>  
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>