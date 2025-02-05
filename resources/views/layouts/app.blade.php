<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#00aba9">
        <meta name="theme-color" content="#ffffff">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner  />

        <div class="min-h-screen bg-gray-100">
            @include('partials._navigation-menu')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    @yield('breadcrumbs')
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @if (Session::has('success'))
                    <div class="max-w-7xl mx-auto pt-5 px-4 sm:px-6 lg:px-8">
                        <div class="bg-green-100 text-green-700 py-2 px-4 rounded-lg">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>

        @include('partials._footer')
        @stack('modals')

        @livewireScripts
        @livewireChartsScripts
        @livewireCalendarScripts

        @stack('javascript')
    </body>
</html>
