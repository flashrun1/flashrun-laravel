let mix = require('laravel-mix');

mix
    .copy('resources/css/style.css', 'public/css')
    .copy('resources/js/common.js', 'public/js')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/files', 'public/files')
    // .js('src/app.js', 'dist')
    // .setPublicPath('dist')
;
