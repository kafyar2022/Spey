<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{
  public function create(Request $request)
  {
    $request->validate([
      'category-id' => 'required',
      'ru-title' => 'required',
      'en-title' => 'required',
    ]);

    $imgName = 'muffin-grey.svg';
    if ($request->hasFile('photo')) {
      $img = request('photo');
      $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move(public_path('img/news'), $imgName);
    }

    $news = News::create([
      'img' => $imgName,
      'category_id' => request('category-id'),
      'ru_title' => request('ru-title'),
      'en_title' => request('en-title'),
      'slug' => SlugService::createSlug(News::class, 'slug', request('ru-title')),
      'ru_text' => request('ru-text'),
      'en_text' => request('en-text'),
    ]);

    if ($news) {
      return back()->with('success', 'Новость успешно добавлена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function update(Request $request)
  {
    $request->validate([
      'category-id' => 'required',
      'ru-title' => 'required',
      'en-title' => 'required',
    ]);

    $news = News::find(request('news-id'));

    if ($request->hasFile('photo')) {
      $path = public_path('img/news/' . $news->img);
      if ($news->img !== 'muffin-grey.svg' && file_exists($path)) {
        unlink($path);
      }
      $img = request('photo');
      $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move(public_path('img/news'), $imgName);
      $news->img = $imgName;
    }

    $news->category_id = request('category-id');
    $news->en_title = request('en-title');
    $news->ru_title = request('ru-title');
    $news->en_text = request('en-text');
    $news->ru_text = request('ru-text');
    $update = $news->update();

    if ($update) {
      return back()->with('success', 'Новость успешно изменена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function delete(Request $request)
  {
    $news = News::find($request->id);
    $news->trashed = true;
    $save = $news->save();
    if ($save) {
      return redirect(route('dashboard.news'))->with('success', 'Новость успешно удален!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function dashSearch(Request $request)
  {
    $keyword = $request->keyword;
    $locale = App::currentLocale();
    // get quantities
    $newsQuantity = News::where('trashed', false)->count();
    $categoriesQuantity = NewsCategory::where('trashed', false)->count();
    // find result
    $news = News::select(
      'id',
      $locale . '_title as title',
      'trashed',
    )->where('trashed', false)->where($locale . '_title', 'like', '%' . $keyword . '%')
      ->orderBy('title', 'asc')->paginate(15);
    $rank = $news->firstItem();

    return view('dashboard.pages.news.index', compact('newsQuantity', 'categoriesQuantity', 'news', 'rank', 'keyword'));
  }

  public function createCategory(Request $request)
  {
    $category = new NewsCategory;
    $category->ru_title = $request->input('ru-title');
    $category->en_title = $request->input('en-title');
    $save = $category->save();

    if ($save) {
      return redirect(route('dashboard.news.categories'))->with('success', 'Категория успешно добавлена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function updateCategory(Request $request)
  {
    $category = NewsCategory::find($request->id);
    $category->ru_title = $request->input('ru-title');
    $category->en_title = $request->input('en-title');
    $save = $category->save();

    if ($save) {
      return redirect(route('dashboard.news.categories'))->with('success', 'Категория успешно изменена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function deleteCategory(Request $request)
  {
    $category = NewsCategory::find($request->id);
    $category->trashed = true;
    $save = $category->save();
    if ($save) {
      return redirect(route('dashboard.news.categories'))->with('success', 'Категория успешно удалена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function dashCategoriesSearch(Request $request)
  {
    $keyword = $request->keyword;
    $locale = App::currentLocale();
    // get quantities
    $newsQuantity = News::where('trashed', false)->count();
    $categoriesQuantity = NewsCategory::where('trashed', false)->count();
    // find result
    $categories = NewsCategory::where('trashed', false)->where($locale . '_title', 'like', '%' . $keyword . '%')
      ->orderBy('ru_title', 'asc')->paginate(15);
    $rank = $categories->firstItem();

    return view('dashboard.pages.news.categories', compact('newsQuantity', 'categoriesQuantity', 'categories', 'rank', 'keyword'));
  }
}
