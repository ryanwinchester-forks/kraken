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

</head>
<body>

@include('partials.nav')

@yield('content')

<script src="{{ elixir('js/all.js') }}"></script>

@yield('scripts')

</body>
</html>
