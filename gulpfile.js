var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.sass('app.scss')

    .scripts([
        'jquery/dist/jquery.js',
        'bootstrap-sass-official/assets/javascripts/bootstrap.js'
    ],
        'public/js/vendor.js',
        'resources/assets/bower'
    )

    .scripts(
        ['app.js'],
        'public/js/app.js',
        'resources/assets/js'
    )

    .browserify(
        'App.js',
        'public/js/components/',
        'resources/assets/jsx'
    )

    .version([
        'css/app.css',
        'js/app.js',
        'js/vendor.js'
    ]);

});
