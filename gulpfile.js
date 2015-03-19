var elixir = require('laravel-elixir');

elixir(function(mix) {

    mix.sass('app.scss');

    mix.scripts([
        '../assets/bower/jquery/dist/jquery.js',
        '../assets/bower/bootstrap-sass-official/assets/javascripts/bootstrap.js',
        '../assets/js/app.js'
    ]);

    mix.version([
        'css/app.css',
        'js/all.js'
    ]);

});
