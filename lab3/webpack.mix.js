const mix = require('laravel-mix');

mix.js('js/app.js', 'public/js')
   .js('js/bootstrap.js', 'public/js')
   .js('js/jquery.js', 'public/js')
   .sass('sass/app.sass', 'public/css');

// mix.sass('sass/app.sass', 'public/css');
