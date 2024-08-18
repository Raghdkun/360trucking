const mix = require('laravel-mix');

mix.sass('resources/scss/bootstrap.scss', 'public/css')
   .options({
      processCssUrls: false
   })
   .sourceMaps();
