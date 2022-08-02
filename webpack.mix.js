let mix = require('laravel-mix');

mix
    .copy('resources/css/style.css', 'public/css')
    .copy('resources/js/common.js', 'public/js')
    .copyDirectory('resources/images', 'public/images')
    // .js('src/app.js', 'dist')
    // .setPublicPath('dist')
;
