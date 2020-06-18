const mix = require('laravel-mix');
const base = 'webroot';

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath(base).js('src/Scripts/main.js', 'js').version();

mix.setPublicPath(base).sass('src/Styles/app.scss', 'css').version();

// Browsersyncリロード
mix.browserSync({
    proxy: {
        target: 'http://php-book-app-web', //nginxのコンテナサービス名と一致させる
    },
    files: [
        "./config/**/*",
        "./src/**/*",
        "./webroot/**/*",
    ],
    open: false,
    reloadOnRestart: true,
});