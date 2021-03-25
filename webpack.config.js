const path = require('path')

const vendorPath = path.resolve(__dirname, 'vendor');
const novaPath = path.resolve(vendorPath, 'laravel/nova');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve(novaPath, 'resources/js'),
            '@nova-path': novaPath,
            '@custom-ui-path': path.resolve(vendorPath, 'soluzione-software/nova-custom-ui'),
        },
    },
}
