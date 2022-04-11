<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use stdClass;

class MainController extends Controller
{
  public function setLocale(Request $request)
  {
    $locale = $request->locale;
    App::setLocale($locale);
    Session::put('locale', $locale);

    return redirect()->back();
  }

  public function search(Request $request)
  {
    $keyword = $request->keyword;
    $locale = App::currentLocale();
    $result = new stdClass;

    $result->products = Product::select(
      'id',
      $locale . '_title as title',
      'slug',
      'trashed',
    )->where('trashed', false)
      ->where($locale . '_title', 'like', '%' . $keyword . '%')
      ->take(3)
      ->get();

    foreach ($result->products as $product) {
      $product->title = Helper::boldKeyword($keyword, $product->title);
    }

    $result->news = News::select(
      'id',
      $locale . '_title as title',
      'slug',
      $locale . '_text as text',
      'trashed',
    )->where($locale . '_title', 'like', '%' . $keyword . '%')
      ->take(3)
      ->get();

    foreach ($result->news as $news) {
      $news->title = Helper::boldKeyword($keyword, $news->title);
    }

    $result->texts = Text::select(
      'id',
      'page_id',
      $locale . '_text as text',
      'anchor',
    )->where($locale . '_text', 'like', '%' . $keyword . '%')
      ->take(4)
      ->get();

    foreach ($result->texts as $text) {
      $text->text = Helper::boldKeyword($keyword, $text->text);
    }

    return view('layouts.search-result', compact('result', 'keyword'));
  }
}
