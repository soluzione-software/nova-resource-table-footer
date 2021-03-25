let mix = require('laravel-mix')

const webpackConfig = require('./webpack.config')

mix
    .setPublicPath('dist')
    .webpackConfig(webpackConfig)
    .js('resources/js/index.js', 'js')
