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
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="bg-img">

        @component('dashboard.components.dashboard-navbar', ["current" => $current ?? ''])

        @endcomponent


        <div class="section columns">

            <section class="column is-narrow">
                @component('dashboard.components.sidebar')

                @endcomponent
            </section>
            <section class="column is-9">
                @hasSection ('content')
                    @yield('content')
                @endif

            </section>
        </div>
</body>
</html>
