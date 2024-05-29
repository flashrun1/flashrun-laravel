const path = require('path');
const mix = require('laravel-mix');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin({
            cleanOnceBeforeBuildPatterns: [
                path.resolve(__dirname, 'public/css'),
                path.resolve(__dirname, 'public/js'),
                path.resolve(__dirname, 'public/files'),
                path.resolve(__dirname, 'public/images')
            ],
            verbose: true
        })
    ],
})

mix
    .copy('resources/css/style.css', 'public/css')
    .copy('resources/js/common.js', 'public/js')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/files', 'public/files')
    .copyDirectory('resources/js/static', 'public/js/static')
