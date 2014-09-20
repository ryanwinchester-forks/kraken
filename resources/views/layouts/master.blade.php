<!doctype html>
<html class="no-js" lang="" ng-app="Kraken">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/vendor/trNgGrid/trNgGrid.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-rc.1/angular.min.js"></script>
        <script src="/js/vendor/ui-bootstrap-tpls.min.js"></script>
        <script src="/vendor/trNgGrid/trNgGrid.min.js"></script>

        @yield('styles')

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @yield('content')


        <script src="/js/main.js"></script>
        @yield('scripts')

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        {{--<script>--}}
            {{--(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=--}}
            {{--function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;--}}
            {{--e=o.createElement(i);r=o.getElementsByTagName(i)[0];--}}
            {{--e.src='//www.google-analytics.com/analytics.js';--}}
            {{--r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));--}}
            {{--ga('create','UA-XXXXX-X','auto');ga('send','pageview');--}}
        {{--</script>--}}
    </body>
</html>