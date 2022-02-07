<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\ProductsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    public function index()
    {
        $locale = App::currentLocale();
        // get quantities
        $productsQuantity = Product::where('trashed', false)->count();
        $categoriesQuantity = ProductsCategory::where('trashed', false)->count();
        // paginate all products
        $products = Product::select(
            'id',
            $locale . '_title as title',
            'trashed',
        )->where('trashed', false)->orderBy('title', 'asc')->paginate(15);
        $rank = $products->firstItem();

        return view('dashboard.pages.products.index', compact('productsQuantity', 'categoriesQuantity', 'products', 'rank'));
    }

    public function productsCreate()
    {
        $locale = App::currentLocale();
        // get quantities
        $productsQuantity = Product::where('trashed', false)->count();
        // get all products categories
        $categories = ProductsCategory::select(
            'id',
            $locale . '_title as title',
            'trashed',
        )->where('trashed', false)->orderBy('title', 'asc')->get();

        return view('dashboard.pages.products.create', compact('productsQuantity', 'categories'));
    }

    public function productsUpdate(Product $product)
    {
        $locale = App::currentLocale();
        // get quantities
        $productsQuantity = Product::where('trashed', false)->count();
        // get all products categories
        $categories = ProductsCategory::select(
            'id',
            $locale . '_title as title',
            'trashed',
        )->where('trashed', false)->orderBy('title', 'asc')->get();

        return view('dashboard.pages.products.update', compact('productsQuantity', 'categories', 'product'));
    }

    public function productsCategories()
    {
        $locale = App::currentLocale();
        // get quantities
        $productsQuantity = Product::where('trashed', false)->count();
        $categoriesQuantity = ProductsCategory::where('trashed', false)->count();
        // paginate all products categories
        $categories = ProductsCategory::where('trashed', false)->orderBy('ru_title', 'asc')->paginate(15);
        $rank = $categories->firstItem();

        return view('dashboard.pages.products.categories', compact('productsQuantity', 'categoriesQuantity', 'categories', 'rank'));
    }

    public function news()
    {
        $locale = App::currentLocale();
        // get quantities
        $newsQuantity = News::where('trashed', false)->count();
        $categoriesQuantity = NewsCategory::where('trashed', false)->count();
        // paginate all news
        $news = News::select(
            'id',
            $locale . '_title as title',
            'trashed',
        )->where('trashed', false)->orderBy('title', 'asc')->paginate(15);
        $rank = $news->firstItem();

        return view('dashboard.pages.news.index', compact('newsQuantity', 'categoriesQuantity', 'news', 'rank'));
    }

    public function newsCreate()
    {
        $locale = App::currentLocale();
        // get quantities
        $newsQuantity = News::where('trashed', false)->count();
        // get all news categories
        $categories = NewsCategory::select(
            'id',
            $locale . '_title as title',
            'trashed',
        )->where('trashed', false)->orderBy('title', 'asc')->get();

        return view('dashboard.pages.news.create', compact('newsQuantity', 'categories'));
    }

    public function newsUpdate(News $news)
    {
        $locale = App::currentLocale();
        // get quantities
        $newsQuantity = News::where('trashed', false)->count();
        // get all products categories
        $categories = NewsCategory::select(
            'id',
            $locale . '_title as title',
            'trashed',
        )->where('trashed', false)->orderBy('title', 'asc')->get();

        return view('dashboard.pages.news.update', compact('newsQuantity', 'categories', 'news'));
    }

    public function newsCategories()
    {
        $locale = App::currentLocale();
        // get quantities
        $newsQuantity = News::where('trashed', false)->count();
        $categoriesQuantity = NewsCategory::where('trashed', false)->count();
        // paginate all products categories
        $categories = NewsCategory::where('trashed', false)->orderBy('ru_title', 'asc')->paginate(15);
        $rank = $categories->firstItem();

        return view('dashboard.pages.news.categories', compact('newsQuantity', 'categoriesQuantity', 'categories', 'rank'));
    }

    public function histories()
    {
        $locale = App::currentLocale();
        // get quantities
        $historiesQuantity = History::where('trashed', false)->count();
        // paginate all histories
        $histories = History::select(
            'id',
            $locale . '_title as title',
            'year',
            'trashed',
        )->where('trashed', false)->orderBy('year', 'desc')->paginate(15);
        $rank = $histories->firstItem();

        return view('dashboard.pages.histories.index', compact('historiesQuantity', 'histories', 'rank'));
    }

    public function historiesCreate()
    {
        $locale = App::currentLocale();
        // get quantities
        $historiesQuantity = News::where('trashed', false)->count();

        return view('dashboard.pages.histories.create', compact('historiesQuantity'));
    }

    public function historiesUpdate(History $history)
    {
        $locale = App::currentLocale();
        // get quantities
        $historiesQuantity = History::where('trashed', false)->count();

        return view('dashboard.pages.histories.update', compact('historiesQuantity', 'history'));
    }
}
