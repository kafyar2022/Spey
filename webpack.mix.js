const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(['resources/js/layouts/master.js',
    'resources/js/layouts/header.js',
    'resources/js/layouts/footer.js',
    'resources/js/auth/login.js',
    'resources/js/components/news-card.js',
    'resources/js/components/pagination.js',
    'resources/js/components/products-card.js',
    'resources/js/pages/index.js',
    'resources/js/pages/about/index.js',
    'resources/js/pages/contacts/index.js',
    'resources/js/pages/news/index.js',
    'resources/js/pages/news/read.js',
    'resources/js/pages/products/index.js',
    'resources/js/pages/products/read.js'], 'public/js/app.js')
    .js(['resources/js/dashboard/master.js',
        'resources/js/components/pagination.js',
        'resources/js/dashboard/pages/products/index.js',
        'resources/js/dashboard/pages/products/create.js',
        'resources/js/dashboard/pages/products/update.js',
        'resources/js/dashboard/pages/products/categories.js',
        'resources/js/dashboard/pages/news/index.js',
        'resources/js/dashboard/pages/news/create.js',
        'resources/js/dashboard/pages/news/update.js',
        'resources/js/dashboard/pages/news/categories.js',
        'resources/js/dashboard/pages/histories/index.js',
        'resources/js/dashboard/pages/histories/create.js',
        'resources/js/dashboard/pages/histories/update.js'], 'public/js/dashboard.js')
    .styles(['resources/css/layouts/master.css',
        'resources/css/layouts/header.css',
        'resources/css/layouts/footer.css',
        'resources/css/layouts/search-result.css',
        'resources/css/auth/login.css',
        'resources/css/components/news-card.css',
        'resources/css/components/pagination.css',
        'resources/css/components/products-card.css',
        'resources/css/pages/index.css',
        'resources/css/pages/about/index.css',
        'resources/css/pages/contacts/index.css',
        'resources/css/pages/news/index.css',
        'resources/css/pages/news/read.css',
        'resources/css/pages/products/index.css',
        'resources/css/pages/products/read.css'], 'public/css/app.css')
    .styles(['resources/css/dashboard/master.css',
        'resources/css/components/pagination.css',
        'resources/css/dashboard/pages/products/index.css',
        'resources/css/dashboard/pages/products/create.css',
        'resources/css/dashboard/pages/products/update.css',
        'resources/css/dashboard/pages/products/categories.css'], 'public/css/dashboard.css')
    .version();
