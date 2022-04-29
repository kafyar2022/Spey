<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductsCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
  public function search(Request $request)
  {
    $locale = App::currentLocale();
    // Find products
    $products = Product::select(
      'products.id',
      'products.category_id',
      'products.' . $locale . '_title as title',
      'slug',
      'products.recipe',
      'products.img',
      'icon',
      'products.view_rate',
      'trashed'
    )->where('trashed', false)->where('products.' . $locale . '_title', 'like', '%' . $request->keyword . '%')->orderBy('products.view_rate', 'desc');

    switch ($request->filter) {
      case 'with-recipe':
        if ($request->category) {
          $products = $products->where('recipe', true)->where('category_id', $request->category)->paginate(6);
          $recipe = true;
          $currentCategory = ProductsCategory::find($request->category);
          return view('pages.products.data.products', compact('products', 'recipe', 'currentCategory'))->render();
        } else {
          $products = $products->where('recipe', true)->paginate(6);
          $recipe = true;
          return view('pages.products.data.products', compact('products', 'recipe'))->render();
        }
        break;

      case 'without-recipe':
        if ($request->category) {
          $products = $products->where('recipe', false)->where('category_id', $request->category)->paginate(6);
          $recipe = false;
          $currentCategory = ProductsCategory::find($request->category);
          return view('pages.products.data.products', compact('products', 'recipe', 'currentCategory'))->render();
        } else {
          $products = $products->where('recipe', false)->paginate(6);
          $recipe = false;
          return view('pages.products.data.products', compact('products', 'recipe'))->render();
        }
        break;

      default:
        if ($request->category) {
          $products = $products->where('category_id', $request->category)->paginate(6);
          $currentCategory = ProductsCategory::find($request->category);
          return view('pages.products.data.products', compact('products', 'currentCategory'))->render();
        } else {
          $products = $products->paginate(6);
          return view('pages.products.data.products', compact('products'))->render();
        }
        break;
    }
  }

  public function downloadInstructions(Request $request)
  {
    $product = Product::select(
      'products.id',
      'products.' . App::currentLocale() . '_instruction as instruction',
    )->find($request->id);

    if (!$product->instruction) {
      return back();
    }
    $file = public_path('files/' . $product->instruction);

    $extension = pathinfo($file, PATHINFO_EXTENSION);

    $headers = array(
      'Content-Type: application/' . $extension,
    );

    return response()->download($file, $product->instruction, $headers);
  }

  public function create(Request $request)
  {
    $request->validate([
      'category-id' => 'required',
      'prescription' => 'required',
      'ru-title' => 'required',
      'en-title' => 'required',
    ]);

    $imgName = 'muffin-grey.svg';
    if ($request->has('photo')) {
      $img = request('photo');
      $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
      $path = public_path('img/products');
      $img->move($path, $imgName);
    }

    $ruInstructionName = '';
    if ($request->has('ru-instruction')) {
      $ruInstruction = request('ru-instruction');
      $ruInstructionName = strtolower($request->input('ru-title')) . '-ru.' . $ruInstruction->getClientOriginalExtension();
      $ruInstruction->move(public_path('files'), $ruInstructionName);
    }

    $enInstructionName = '';
    if ($request->has('en-instruction')) {
      $enInstruction = request('en-instruction');
      $enInstructionName = strtolower($request->input('en-title')) . '-en.' . $enInstruction->getClientOriginalExtension();
      $enInstruction->move(public_path('files'), $enInstructionName);
    }

    $product = Product::create([
      'img' => $imgName,
      'icon' => request('icon'),
      'category_id' => request('category-id'),
      'recipe' => request('prescription'),
      'ru_title' => request('ru-title'),
      'en_title' => request('en-title'),
      'slug' => SlugService::createSlug(Product::class, 'slug', $request->input('ru-title')),
      'ru_instruction' => $ruInstructionName,
      'en_instruction' => $enInstructionName,
      'ru_description' => request('ru-description'),
      'en_description' => request('en-description'),
      'ru_composition' => request('ru-composition'),
      'en_composition' => request('en-composition'),
      'ru_indications' => request('ru-indications'),
      'en_indications' => request('en-indications'),
      'ru_method' => request('ru-method'),
      'en_method' => request('en-method'),
    ]);

    if ($product) {
      return back()->with('success', 'Новый продукт успешно добавлен!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function update(Request $request)
  {
    $request->validate([
      'category-id' => 'required',
      'prescription' => 'required',
      'ru-title' => 'required',
      'en-title' => 'required',
    ]);

    $product = Product::find(request('product-id'));

    if ($request->has('photo')) {
      $path = public_path('img/products/' . $product->img);
      if ($product->img !== 'muffin-grey.svg' && file_exists($path)) {
        unlink($path);
      }
      $img = request('photo');
      $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
      $img->move(public_path('img/products'), $imgName);
      $product->img = $imgName;
    }

    $product->icon = request('icon');
    $product->category_id = request('category-id');
    $product->recipe = request('prescription');
    $product->ru_title = request('ru-title');
    $product->en_title = request('en-title');

    if ($request->hasFile('ru-instruction')) {
      $path = public_path('files/' . $product->ru_instruction);
      if ($product->ru_instruction && file_exists($path)) {
        unlink($path);
      }
      $ruInstruction = request('ru-instruction');
      $ruInstructionName = strtolower($request->input('ru-title')) . '-ru.' . $ruInstruction->getClientOriginalExtension();
      $ruInstruction->move(public_path('files'), $ruInstructionName);
      $product->ru_instruction = $ruInstructionName;
    }
    if ($request->hasFile('en-instruction')) {
      $path = public_path('files/' . $product->en_instruction);
      if ($product->en_instruction && file_exists($path)) {
        unlink($path);
      }
      $enInstruction = request('en-instruction');
      $enInstructionName = strtolower($request->input('en-title')) . '-en.' . $enInstruction->getClientOriginalExtension();
      $enInstruction->move(public_path('files'), $enInstructionName);
      $product->en_instruction = $enInstructionName;
    }
    if ($request->has('ru-instruction-deleted')) {
      $path = public_path('files/' . $product->ru_instruction);
      if ($product->ru_instruction && file_exists($path)) {
        unlink($path);
      }
      $product->ru_instruction = '';
    }
    if ($request->has('en-instruction-deleted')) {
      $path = public_path('files/' . $product->en_instruction);
      if ($product->en_instruction && file_exists($path)) {
        unlink($path);
      }
      $product->en_instruction = '';
    }

    $product->en_composition = request('en-composition');
    $product->ru_composition = request('ru-composition');
    $product->en_indications = request('en-indications');
    $product->ru_indications = request('ru-indications');
    $product->en_description = request('en-description');
    $product->ru_description = request('ru-description');
    $product->en_method = request('en-method');
    $product->ru_method = request('ru-method');

    $update = $product->update();

    if ($update) {
      return back()->with('success', 'Продукт успешно изменен!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function delete(Request $request)
  {
    $product = Product::find($request->id);
    $product->trashed = true;
    $save = $product->save();
    if ($save) {
      return redirect(route('dashboard'))->with('success', 'Продукт успешно удален!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function dashSearch(Request $request)
  {
    $keyword = $request->keyword;
    $locale = App::currentLocale();
    // get quantities
    $productsQuantity = Product::where('trashed', false)->count();
    $categoriesQuantity = ProductsCategory::where('trashed', false)->count();
    // find result
    $products = Product::select(
      'id',
      $locale . '_title as title',
      'trashed',
    )->where('trashed', false)->where($locale . '_title', 'like', '%' . $keyword . '%')
      ->orderBy('title', 'asc')->paginate(15);
    $rank = $products->firstItem();

    return view('dashboard.pages.products.index', compact('productsQuantity', 'categoriesQuantity', 'products', 'rank', 'keyword'));
  }

  public function createCategory(Request $request)
  {
    $category = new ProductsCategory;
    $category->ru_title = $request->input('ru-title');
    $category->en_title = $request->input('en-title');
    $category->icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 491.6 491.6"><path d="M394.65 224.2c1.2-8.7 1.8-17.6 1.8-26.6 0-109-88.7-197.6-197.6-197.6-109 0-197.6 88.7-197.6 197.6 0 109 88.7 197.6 197.6 197.6 7.9 0 15.7-.5 23.4-1.4 16.9 56.5 69.3 97.8 131.2 97.8 75.5 0 136.9-61.4 136.9-136.9 0-61.1-40.3-113-95.7-130.5zm-137.1 130.5c0-52.9 43-95.9 95.9-95.9 19 0 36.8 5.6 51.7 15.2l-132.5 132.4c-9.6-14.9-15.1-32.6-15.1-51.7zM42.15 197.6c0-86.4 70.3-156.6 156.6-156.6 35.8 0 68.8 12.1 95.3 32.4L74.55 292.8c-20.3-26.4-32.4-59.4-32.4-95.2zm61.4 124.2l219.5-219.5c20.3 26.4 32.4 59.4 32.4 95.3 0 6.9-.5 13.6-1.3 20.2h-.7c-75 0-136.1 60.6-136.9 135.4-5.8.7-11.7 1-17.7 1-35.8 0-68.9-12.1-95.3-32.4zm249.9 128.8c-19 0-36.8-5.6-51.7-15.2L434.15 303c9.6 14.9 15.2 32.7 15.2 51.7 0 52.9-43.1 95.9-95.9 95.9z"/></svg>';
    $save = $category->save();

    if ($save) {
      return redirect(route('dashboard.products.categories'))->with('success', 'Категория успешно добавлена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function updateCategory(Request $request)
  {
    $category = ProductsCategory::find($request->id);
    $category->ru_title = $request->input('ru-title');
    $category->en_title = $request->input('en-title');
    $save = $category->save();

    if ($save) {
      return redirect(route('dashboard.products.categories'))->with('success', 'Категория успешно изменена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function deleteCategory(Request $request)
  {
    $category = ProductsCategory::find($request->id);
    $category->trashed = true;
    $save = $category->save();
    if ($save) {
      return redirect(route('dashboard.products.categories'))->with('success', 'Категория успешно удалена!');
    } else {
      return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
    }
  }

  public function dashCategoriesSearch(Request $request)
  {
    $keyword = $request->keyword;
    $locale = App::currentLocale();
    // get quantities
    $productsQuantity = Product::where('trashed', false)->count();
    $categoriesQuantity = ProductsCategory::where('trashed', false)->count();
    // find result
    $categories = ProductsCategory::where('trashed', false)->where($locale . '_title', 'like', '%' . $keyword . '%')
      ->orderBy('ru_title', 'asc')->paginate(15);
    $rank = $categories->firstItem();

    return view('dashboard.pages.products.categories', compact('productsQuantity', 'categoriesQuantity', 'categories', 'rank', 'keyword'));
  }
}
