<?php

namespace App\Providers;

use App\Helpers\Helper;
use App\Models\NewsCategory;
use App\Models\Page;
use App\Models\ProductsCategory;
use App\Models\Site;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Component;
use stdClass;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Schema::defaultStringLength(191);
    Paginator::useBootstrap();

    view()->composer('*', function ($view) {
      $locale = App::currentLocale();
      //! =>> header data
      $header = new stdClass;

      $header->sites = Site::select(
        'id',
        $locale . '_title as title',
        'link',
        'trashed'
      )->where('trashed', false)
        ->get();

      $header->pages = Page::select(
        'id',
        $locale . '_title as title',
        'route',
      )->get();
      //! header data <<=
      //! =>> footer data
      $footer = new stdClass;

      $footer->products = ProductsCategory::select(
        'id',
        $locale . '_title as title',
        'view_rate',
        'trashed'
      )->where('trashed', false)
        ->orderBy('view_rate', 'desc')
        ->take(10)
        ->get();

      $footer->news = NewsCategory::select(
        'id',
        $locale . '_title as title',
        'view_rate',
        'trashed'
      )->where('trashed', false)
        ->orderBy('view_rate', 'desc')
        ->take(10)
        ->get();
      //! footer data <<=
      $currentSite = Site::select(
        'id',
        $locale . '_address as address',
        'email',
      )->find(7);

      $title = App::currentLocale() . '_title';

      return $view->with('route', \Route::currentRouteName())
        ->with('locale', $locale)
        ->with('header', $header)
        ->with('footer', $footer)
        ->with('currentSite', $currentSite)
        ->with('title', $title);
    });
  }
}
