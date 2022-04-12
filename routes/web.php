<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoriesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Localization route
Route::get('/localization', [MainController::class, 'setLocale'])->name('localization');
// Pages' routes
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/products', [PagesController::class, 'products'])->name('products');
Route::get('/products/{slug}', [PagesController::class, 'productsRead'])->name('products.read');
Route::get('/news', [PagesController::class, 'news'])->name('news');
Route::get('/news/read/{slug}', [PagesController::class, 'newsRead'])->name('news.read');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
// Products' routes
Route::post('/products/search', [ProductsController::class, 'search'])->name('products.search');
Route::get('/products/download/instructions', [ProductsController::class, 'downloadInstructions'])->name('products.download.instructions');
// Auth routes
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
// search route
Route::get('/search', [MainController::class, 'search']);

Route::group(['middleware' => ['AuthCheck']], function () {
  Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');

  Route::group(['middleware' => ['AdminCheck']], function () {
    // dashboard pages
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/products/create', [DashboardController::class, 'productsCreate'])->name('dashboard.products.create');
    Route::get('/dashboard/products/update/{product}', [DashboardController::class, 'productsUpdate'])->name('dashboard.products.update');
    Route::get('/dashboard/products/categories', [DashboardController::class, 'productsCategories'])->name('dashboard.products.categories');

    Route::get('/dashboard/news', [DashboardController::class, 'news'])->name('dashboard.news');
    Route::get('/dashboard/news/create', [DashboardController::class, 'newsCreate'])->name('dashboard.news.create');
    Route::get('/dashboard/news/update/{news}', [DashboardController::class, 'newsUpdate'])->name('dashboard.news.update');
    Route::get('/dashboard/news/categories', [DashboardController::class, 'newsCategories'])->name('dashboard.news.categories');

    Route::get('/dashboard/histories', [DashboardController::class, 'histories'])->name('dashboard.histories');
    Route::get('/dashboard/histories/create', [DashboardController::class, 'historiesCreate'])->name('dashboard.histories.create');
    Route::get('/dashboard/histories/update/{history}', [DashboardController::class, 'historiesUpdate'])->name('dashboard.histories.update');
    Route::get('/dashboard/histories/categories', [DashboardController::class, 'historiesCategories'])->name('dashboard.histories.categories');
    // products routes
    Route::post('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products/update', [ProductsController::class, 'update'])->name('products.update');
    Route::post('/products/delete', [ProductsController::class, 'delete'])->name('products.delete');
    Route::get('/dashboard/products/search', [ProductsController::class, 'dashSearch'])->name('dashboard.products.search');
    Route::post('/products/categories/create', [ProductsController::class, 'createCategory'])->name('products.categories.create');
    Route::post('/products/categories/update', [ProductsController::class, 'updateCategory'])->name('products.categories.update');
    Route::post('/products/categories/delete', [ProductsController::class, 'deleteCategory'])->name('products.categories.delete');
    Route::get('/dashboard/products/categories/search', [ProductsController::class, 'dashCategoriesSearch'])->name('dashboard.products.categories.search');
    // news routes
    Route::post('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/update', [NewsController::class, 'update'])->name('news.update');
    Route::post('/news/delete', [NewsController::class, 'delete'])->name('news.delete');
    Route::get('/dashboard/news/search', [NewsController::class, 'dashSearch'])->name('dashboard.news.search');
    Route::post('/news/categories/create', [NewsController::class, 'createCategory'])->name('news.categories.create');
    Route::post('/news/categories/update', [NewsController::class, 'updateCategory'])->name('news.categories.update');
    Route::post('/news/categories/delete', [NewsController::class, 'deleteCategory'])->name('news.categories.delete');
    Route::get('/dashboard/news/categories/search', [NewsController::class, 'dashCategoriesSearch'])->name('dashboard.news.categories.search');
    // histories routes
    Route::post('/histories/create', [HistoriesController::class, 'create'])->name('histories.create');
    Route::post('/histories/update', [HistoriesController::class, 'update'])->name('histories.update');
    Route::post('/histories/delete', [HistoriesController::class, 'delete'])->name('histories.delete');
    Route::get('/dashboard/histories/search', [HistoriesController::class, 'dashSearch'])->name('dashboard.histories.search');
  });
});
