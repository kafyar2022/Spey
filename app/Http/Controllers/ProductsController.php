<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductsCategory;
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
            'products.recipe',
            'products.img',
            'products.view_rate'
        )->where('products.' . $locale . '_title', 'like', '%' . $request->keyword . '%')->orderBy('products.view_rate', 'desc');

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
        // validation
        $request->validate([
            'category-id' => 'required',
            'ru-title' => 'required',
            'en-title' => 'required',
            'img' => 'required|mimes:png|max:100',
            'ru-instruction' => 'required',
            'en-instruction' => 'required',
            'recipe' => 'required',
            'ru-composition' => 'required',
            'en-composition' => 'required',
            'ru-indications' => 'required',
            'en-indications' => 'required',
            'ru-description' => 'required',
            'en-description' => 'required',
        ]);
        if ($request->recipe == 'true') {
            $request->recipe = true;
        } else {
            $request->recipe = false;
        }
        // save image file
        $img = $request->file('img');
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $path = public_path('img/products');
        $img->move($path, $imgName);
        // save instruction files
        $ruInstruction = $request->file('ru-instruction');
        $enInstruction = $request->file('en-instruction');
        $ruInstructionName = uniqid() . '.' . $ruInstruction->getClientOriginalExtension();
        $enInstructionName = uniqid() . '.' . $enInstruction->getClientOriginalExtension();
        $path = public_path('files');
        $ruInstruction->move($path, $ruInstructionName);
        $enInstruction->move($path, $enInstructionName);
        // create new product
        $product = new Product;
        $product->category_id = $request->input('category-id');
        $product->en_title = $request->input('en-title');
        $product->ru_title = $request->input('ru-title');
        $product->en_instruction = $enInstructionName;
        $product->ru_instruction = $ruInstructionName;
        $product->en_composition = $request->input('en-composition');
        $product->ru_composition = $request->input('ru-composition');
        $product->en_indications = $request->input('en-indications');
        $product->ru_indications = $request->input('ru-indications');
        $product->en_description = $request->input('en-description');
        $product->ru_description = $request->input('ru-description');
        $product->recipe = $request->recipe;
        $product->img = $imgName;
        $save = $product->save();

        if ($save) {
            return back()->with('success', 'Новый продукт успешно добавлен!');
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
            'recipe' => 'required',
            'ru-composition' => 'required',
            'en-composition' => 'required',
            'ru-indications' => 'required',
            'en-indications' => 'required',
            'ru-description' => 'required',
            'en-description' => 'required',
        ]);
        if ($request->file('img')) {
            $request->validate([
                'img' => 'mimes:png|max:100',
            ]);
        }
        if ($request->recipe == 'true') {
            $request->recipe = true;
        } else {
            $request->recipe = false;
        }
        // find product
        $product = Product::find($request->id);
        // save image file
        if ($request->file('img')) {
            // delete previous img
            $path = public_path('img/products/' . $product->img);
            if(file_exists($path)) {
                unlink($path);
            }
            // save new img
            $img = $request->file('img');
            $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
            $path = public_path('img/products');
            $img->move($path, $imgName);
            // update product's img
            $product->img = $imgName;
        }
        // save instruction files
        if ($request->file('ru-instruction')) {
            // delete previous ru_instruction
            $path = public_path('files/' . $product->ru_instruction);
            if (file_exists($path)) {
                unlink($path);
            }
            // save new ru_instruction
            $ruInstruction = $request->file('ru-instruction');
            $ruInstructionName = uniqid() . '.' . $ruInstruction->getClientOriginalExtension();
            $path = public_path('files');
            $ruInstruction->move($path, $ruInstructionName);
            // update product's ru_instruction
            $product->ru_instruction = $ruInstructionName;
        }
        if ($request->file('en-instruction')) {
            // delete previous ru_instruction
            $path = public_path('files/' . $product->en_instruction);
            if (file_exists($path)) {
                unlink($path);
            }
            // save new ru_instruction
            $enInstruction = $request->file('en-instruction');
            $enInstructionName = uniqid() . '.' . $enInstruction->getClientOriginalExtension();
            $path = public_path('files');
            $enInstruction->move($path, $enInstructionName);
            // update product's ru_instruction
            $product->en_instruction = $enInstructionName;
        }
        // update product
        $product->category_id = $request->input('category-id');
        $product->en_title = $request->input('en-title');
        $product->ru_title = $request->input('ru-title');
        $product->en_composition = $request->input('en-composition');
        $product->ru_composition = $request->input('ru-composition');
        $product->en_indications = $request->input('en-indications');
        $product->ru_indications = $request->input('ru-indications');
        $product->en_description = $request->input('en-description');
        $product->ru_description = $request->input('ru-description');
        $product->recipe = $request->recipe;
        $save = $product->save();

        if ($save) {
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
