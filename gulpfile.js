/* Gulp */
var gulp = require('gulp');

// ------------------------------------------------------------------------
// Plugins
// ------------------------------------------------------------------------
var sass    = require('gulp-ruby-sass'); // SASS processing
var prefix  = require('gulp-autoprefixer'); // CSS vendor prefixes
//var minify  = require('gulp-minify-css'); // Minify and cleancss
//var phpunit = require('gulp-phpunit'); // PHP unit testing
var uglify  = require('gulp-uglifyjs'); // compress Javascript

// ------------------------------------------------------------------------
// Directories
// ------------------------------------------------------------------------

// source file paths
var sources = {
    styles: [
       'resources/scss/main.scss'
    ],
    scripts: [
        //'resources/bower_components/angular/angular.js',
        //'resources/bower_components/angular-bootstrap/ui-bootstrap.js',
        //'resources/bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
        'resources/js/**/*.js'
    ]
};

// destination file paths
var targets = {
    styles:  'public/css',
    scripts: 'public/js'
};

// ------------------------------------------------------------------------
// TASKS
// ------------------------------------------------------------------------

// CSS - Compile, Minify and Clean CSS
gulp.task('css', function() {
    return gulp.src(sources.styles)
        .pipe(sass({ style: 'compact' }))
        .pipe(prefix("last 10 versions", "> 5%", "ie 8"))
        .pipe(gulp.dest(targets.styles));
});

// JAVASCRIPT - Compile and Minify Javascript
gulp.task('js', function() {
    return gulp.src(sources.scripts)
        .pipe(uglify('main.min.js', { outSourceMap: true }))
        .pipe(gulp.dest(targets.scripts))
});

// WATCH - watch files and run tasks
gulp.task('watch', function() {
    gulp.watch('resources/scss/**/*.scss', ['css']);
    gulp.watch('resources/js/**/*.js', ['js']);
    // gulp.watch('app/**/*.php', ['phpunit']);
});

// DEFAULT - Default Gulp task
gulp.task('default', ['css', 'js']);
