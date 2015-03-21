var elixir = require('laravel-elixir');

require('elixir-react-jsx');

elixir(function(mix) {

    mix.sass('app.scss')

    .scripts([
        'react/react-with-addons.min.js',
        'jquery/dist/jquery.min.js',
        'bootstrap-sass-official/assets/javascripts/bootstrap.js'
    ], 'public/js/vendor.js', 'resources/assets/bower')

    .scripts(['app.js'], 'public/js/app.js', 'resources/assets/js')

    .jsx()

    .version([
        'css/app.css',
        'js/vendor.js',
        'js/app.js'
    ]);

});
