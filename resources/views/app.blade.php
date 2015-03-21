<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('title')
        <title>Kraken</title>
    @show

    @yield('meta')

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    @yield('styles')

    <script src="{{ elixir('js/vendor.js') }}"></script>

    @if (app()->environment() == 'local')
        <script src="//fb.me/JSXTransformer-0.13.1.js"></script>
    @endif

</head>
<body>

@include('partials.nav')

@yield('content')

@include('partials.footer')

<script src="{{ elixir('js/app.js') }}"></script>

@yield('scripts')

</body>
</html>
