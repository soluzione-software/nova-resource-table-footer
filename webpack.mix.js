let mix = require('laravel-mix')

const novaPath = path.resolve(__dirname, './vendor/laravel/nova');

mix
    .setPublicPath('dist')
    .js('resources/js/index.js', 'js')
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve(novaPath, 'resources/js/'),
                '@nova-path': novaPath,
            },
        },
    })
