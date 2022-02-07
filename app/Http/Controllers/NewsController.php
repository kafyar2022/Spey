<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{
    public function create(Request $request)
    {
        // validation
        $request->validate([
            'category-id' => 'required',
            'ru-title' => 'required',
            'en-title' => 'required',
            'ru-text' => 'required',
            'en-text' => 'required',
            'img' => 'required|mimes:jpg,jpeg|max:100',
        ]);
        // save image file
        $img = $request->file('img');
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $path = public_path('img/news');
        $img->move($path, $imgName);
        // create new news
        $news = new News;
        $news->category_id = $request->input('category-id');
        $news->en_title = $request->input('en-title');
        $news->ru_title = $request->input('ru-title');
        $news->en_text = $request->input('en-text');
        $news->ru_text = $request->input('ru-text');
        $news->img = $imgName;
        $save = $news->save();

        if ($save) {
            return back()->with('success', 'Новость успешно добавлена!');
        } else {
            return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
        }
    }

    public function update(Request $request)
    {
        // validation
        $request->validate([
            'category-id' => 'required',
            'ru-title' => 'required',
            'en-title' => 'required',
            'ru-text' => 'required',
            'en-text' => 'required',
        ]);
        if ($request->file('img')) {
            $request->validate([
                'img' => 'mimes:jpg, jpeg|max:100',
            ]);
        }
        // find news
        $news = News::find($request->id);
        // save image file
        if ($request->file('img')) {
            // delete previous img
            $path = public_path('img/news/' . $news->img);
            if (file_exists($path)) {
                unlink($path);
            }
            // save new img
            $img = $request->file('img');
            $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
            $path = public_path('img/news');
            $img->move($path, $imgName);
            // update product's img
            $news->img = $imgName;
        }
        // update news
        $news->category_id = $request->input('category-id');
        $news->en_title = $request->input('en-title');
        $news->ru_title = $request->input('ru-title');
        $news->en_text = $request->input('en-text');
        $news->ru_text = $request->input('ru-text');
        $save = $news->save();

        if ($save) {
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
