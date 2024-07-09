<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="autumn" class="h-full">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sonatrach</title>

        <link rel="icon" href="storage\logo_sonatrach.png" type="image/x-icon"/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <!-- Styles -->
        @livewireStyles
    </head>
    
    <body class="font-sans antialiased flex flex-col min-h-screen" 
    
        
    @isset(Auth::user()->role)
        @if (Auth::user()->role === 'chef_idc')
            data-theme="lemonade">
        @elseif (Auth::user()->role === 'chef_complex')
            data-theme="nord">
        @elseif (Auth::user()->role === 'agent')
            data-theme="fantasy">
        @else
            data-theme="cupcake">
        @endif
    @endisset

    @unless (isset(Auth::user()->role))
    data-theme="cupcake">
    @endunless
    
        <x-banner />

        @include('layouts.partials.header')

        <main class="container mx-auto px-5 flex flex-grow">
            @yield('content')

            @if(isset($slot)) 
                {{ $slot }} 
            @endif
        </main>

        @include('layouts.partials.footer')

        @stack('modals')

        @livewireScripts
    </body>
</html>
