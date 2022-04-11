<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Company;
use App\Models\History;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductsCategory;
use App\Models\Site;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use stdClass;

class PagesController extends Controller
{
  public function index(Request $request)
  {
    $locale = App::currentLocale();
    $keyword = $request->keyword;

    $data = new stdClass;

    // Get values
    $data->values = Value::select(
      'id',
      $locale . '_title as title',
      $locale . '_text as text',
      'trashed',
    )->where('trashed', false)
      ->get();
    if ($keyword) {
      foreach ($data->values as $value) {
        $value->title = Helper::selectKeyword($keyword, $value->title);
        $value->text = Helper::selectKeyword($keyword, $value->text);
      }
    }
    // Get 6 most viewed news categories
    $data->newsCategories = NewsCategory::select(
      'id',
      $locale . '_title as title',
      'view_rate',
      'trashed',
    )->where('trashed', false)
      ->orderby('view_rate', 'desc')
      ->get();

    if ($keyword) {
      foreach ($data->newsCategories as $category) {
        $category->title = Helper::selectKeyword($keyword, $category->title);
      }
    }
    // Attach to each news categories the most popular news' titles as description
    foreach ($data->newsCategories as $newsCategory) {
      $newsCategory->new = $newsCategory->news()->select(
        'id',
        $locale . '_title as title',
        'slug',
        'view_rate',
        'trashed'
      )->where('trashed', false)->orderBy('view_rate')->first();

      if ($keyword) {
        $newsCategory->new->title = Helper::selectKeyword($keyword, $newsCategory->new->title);
      }
    }
    // Get 6 most viewed product categories
    $data->productsCategories = ProductsCategory::select(
      'id',
      $locale . '_title as title',
      'view_rate',
      'icon',
      'trashed'
    )->where('trashed', false)
      ->orderBy('view_rate', 'desc')
      ->take(6)
      ->get();
    if ($keyword) {
      foreach ($data->productsCategories as $category) {
        $category->title = Helper::selectKeyword($keyword, $category->title);
      }
    }
    // Count products categries
    $data->productsCategoriesQuantity = ProductsCategory::where('trashed', false)->count();
    // Count products
    $data->productsQuantity = Product::where('trashed', false)->count();
    // Get 6 most popular products
    $data->popularProducts = Product::select(
      'id',
      'category_id',
      $locale . '_title as title',
      'slug',
      'img',
      'view_rate',
      'recipe',
      'icon',
      'trashed',
    )->where('trashed', false)
      ->orderBy('view_rate', 'desc')
      ->take(6)
      ->get();
    if ($keyword) {
      foreach ($data->popularProducts as $product) {
        $product->title = Helper::selectKeyword($keyword, $product->title);
      }
    }

    $page = Page::where('route', 'home')->first();
    $page = Helper::addPagesContent($page, $locale, $keyword);

    if ($keyword) {
      return view('pages.index', compact('data', 'page', 'keyword'));
    } else {
      return view('pages.index', compact('data', 'page'));
    }
  }
  public function about(Request $request)
  {
    $locale = App::currentLocale();
    $keyword = $request->keyword;
    $data = new stdClass;
    // get company histories
    $data->histories = History::select(
      'id',
      $locale . '_title as title',
      $locale . '_text as text',
      'year',
      'trashed',
    )->where('trashed', false)
      ->orderBy('year', 'desc')
      ->get();
    if ($keyword) {
      foreach ($data->histories as $history) {
        $history->title = Helper::selectKeyword($keyword, $history->title);
        $history->text = Helper::selectKeyword($keyword, $history->text);
      }
    }
    // get companies in numbers
    $data->companies = Company::select(
      'id',
      'quantity',
      $locale . '_title as title',
      $locale . '_text as text',
      'trashed',
    )->where('trashed', false)
      ->get();
    if ($keyword) {
      foreach ($data->companies as $company) {
        $company->title = Helper::selectKeyword($keyword, $company->title);
        $company->text = Helper::selectKeyword($keyword, $company->text);
      }
    }
    // Get values
    $data->values = Value::select(
      'id',
      $locale . '_title as title',
      $locale . '_text as text',
      'trashed',
    )->where('trashed', false)
      ->get();
    if ($keyword) {
      foreach ($data->values as $value) {
        $value->title = Helper::selectKeyword($keyword, $value->title);
        $value->text = Helper::selectKeyword($keyword, $value->text);
      }
    }
    // get spey sites
    $data->sites = Site::select(
      'id',
      $locale . '_location as location',
      'trashed',
    )->where('trashed', false)
      ->get();
    if ($keyword) {
      foreach ($data->sites as $site) {
        $site->location = Helper::selectKeyword($keyword, $site->location);
      }
    }
    // get map
    $defaultMap = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d23682367.238464795!2d21.486589822507256!3d43.56667570684504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2s!4v1635482910688!5m2!1sru!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>';
    $data->siteMap = $defaultMap;
    $data->siteID = $request->site;
    if ($data->siteID) {
      $data->siteMap = Site::select(
        'id',
        'map',
      )->find($data->siteID)->map;
    }

    $page = Page::where('route', 'about')->first();
    $page = Helper::addPagesContent($page, $locale, $keyword);

    if ($keyword) {
      return view('pages.about.index', compact('data', 'page', 'keyword'));
    } else {
      return view('pages.about.index', compact('data', 'page'));
    }
  }
  public function products(Request $request)
  {
    $locale = App::currentLocale();
    $keyword = $request->keyword;
    $data = new stdClass;
    // Get product categories' titles
    $data->categories = ProductsCategory::select(
      'id',
      $locale . '_title as title',
      'trashed',
      'view_rate',
    )->where('trashed', false)
      ->orderBy('view_rate', 'desc')
      ->get();

    $page = Page::where('route', 'products')->first();
    $page = Helper::addPagesContent($page, $locale, $keyword);

    if ($request->category) {
      // Get products by category
      $data->products = Product::select(
        'id',
        'category_id',
        $locale . '_title as title',
        'slug',
        'img',
        'icon',
        'view_rate',
        'trashed',
      )->where('trashed', false)
        ->where('category_id', $request->category)
        ->orderBy('view_rate', 'desc')
        ->paginate(6);

      if ($keyword) {
        foreach ($data->products as $product) {
          $product->title = Helper::selectKeyword($keyword, $product->title);
        }
      }

      $currentCategory = ProductsCategory::find($request->category);

      return view('pages.products.index', compact('data', 'page', 'currentCategory'));
    } else {
      // Get all products
      $data->products = Product::select(
        'id',
        'category_id',
        $locale . '_title as title',
        'slug',
        'img',
        'icon',
        'view_rate',
        'trashed',
      )->where('trashed', false)
        ->orderBy('view_rate', 'desc')
        ->paginate(6);
      if ($keyword) {
        foreach ($data->products as $product) {
          $product->title = Helper::selectKeyword($keyword, $product->title);
        }
      }

      return view('pages.products.index', compact('data', 'page'));
    }
  }
  public function productsRead($slug)
  {
    $locale = App::currentLocale();
    // Get product
    $product = Product::select(
      'id',
      'category_id',
      $locale . '_title as title',
      'slug',
      $locale . '_instruction as instruction',
      $locale . '_composition as composition',
      $locale . '_indications as indications',
      $locale . '_description as description',
      $locale . '_method as method',
      'view_rate',
      'recipe',
      'img',
    )->where('slug', $slug)->first();
    // increase view rate
    $product->view_rate++;
    $product->save();
    $productCategory = ProductsCategory::select(
      'id',
      'view_rate',
    )->find($product->category_id);
    $productCategory->view_rate++;
    $productCategory->save();
    // Get products' category's titles
    $productsCategories = ProductsCategory::select(
      'id',
      $locale . '_title as title',
      'trashed',
    )->where('trashed', false)->get();
    // Get similar products
    $similarProducts = Product::select(
      'id',
      'category_id',
      $locale . '_title as title',
      'slug',
      'img',
      'icon',
      'view_rate',
      'trashed',
    )->where('trashed', false)->where('category_id', $product->category_id)->orderBy('view_rate', 'desc')->get();

    return view('pages.products.read', compact('product', 'productsCategories', 'similarProducts'));
  }
  public function news(Request $request)
  {
    $locale = App::currentLocale();
    $keyword = $request->keyword;

    $page = Page::where('route', 'news')->first();
    $page = Helper::addPagesContent($page, $locale, $keyword);

    $data = new stdClass;
    $data->news = News::select(
      'id',
      'category_id',
      $locale . '_title as title',
      'slug',
      'view_rate',
      'img',
      'trashed',
    )->where('trashed', false)
      ->orderBy('view_rate', 'desc');

    $data->categories = NewsCategory::select(
      'id',
      $locale . '_title as title',
      'view_rate',
      'trashed',
    )->where('trashed', false)
      ->orderBy('view_rate', 'desc')
      ->get();

    if ($keyword) {
      foreach ($data->categories as $category) {
        $category->title = Helper::selectKeyword($keyword, $category->title);
      }
    }

    if ($request->category) {
      $data->news = $data->news->where('category_id', $request->category)->paginate(6)->fragment('all-news');
      $currentCategory = NewsCategory::select(
        'id',
        $locale . '_title as title',
      )->find($request->category);

      if ($keyword) {
        foreach ($data->news as $news) {
          $news->title = Helper::selectKeyword($keyword, $news->title);
        }
      }

      return view('pages.news.index', compact('data', 'currentCategory', 'page'));
    } else {
      $data->news = $data->news->paginate(6)->fragment('all-news');

      if ($keyword) {
        foreach ($data->news as $news) {
          $news->title = Helper::selectKeyword($keyword, $news->title);
        }
      }

      return view('pages.news.index', compact('data', 'page'));
    }
  }
  public function newsRead($slug)
  {
    $locale = App::currentLocale();

    $news = News::select(
      'id',
      'category_id',
      $locale . '_title as title',
      'slug',
      $locale . '_text as text',
      'view_rate',
      'img',
    )->where('slug', $slug)->first();
    // increase view rate
    $news->view_rate++;
    $news->save();
    $newsCategory = NewsCategory::select(
      'id',
      'view_rate',
    )->find($news->category_id);
    $newsCategory->view_rate++;
    $newsCategory->save();
    // get similar news
    $similarNews = News::select(
      'id',
      'category_id',
      $locale . '_title as title',
      'view_rate',
      'img',
      'trashed',
    )->where('trashed', false)->orderBy('view_rate', 'desc')->get();

    return view('pages.news.read', compact('news', 'similarNews'));
  }
  public function contacts(Request $request)
  {
    $locale = App::currentLocale();
    $keyword = $request->keyword;

    $page = Page::find(6);
    $page = Helper::addPagesContent($page, $locale, $keyword);

    // Get spey sites
    $speySites = Site::select(
      'id',
      $locale . '_location as location',
      $locale . '_title as title',
      'trashed',
    )->where('trashed', false)->get();

    if ($keyword) {
      foreach ($speySites as $site) {
        $site->title = Helper::selectKeyword($keyword, $site->title);
        $site->location = Helper::selectKeyword($keyword, $site->location);
      }
    }
    // Get map
    $defaultID = 7;
    $siteID = $request->site;
    if (!$siteID) {
      $siteID = $defaultID;
    }
    $activeSite = Site::select(
      'id',
      $locale . '_title as title',
      $locale . '_location as location',
      'map',
      $locale . '_address as address',
      'email',
    )->find($siteID);

    return view('pages.contacts.index', compact('speySites', 'activeSite', 'page'));
  }
}
