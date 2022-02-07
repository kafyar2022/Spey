<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HistoriesController extends Controller
{
    public function create(Request $request)
    {
        // validation
        $request->validate([
            'ru-title' => 'required|string|max:80',
            'en-title' => 'required|string|max:80',
            'ru-text' => 'required',
            'en-text' => 'required',
            'year' => 'required|numeric|digits:4',
        ]);
        // create new history
        $history = new History;
        $history->en_title = $request->input('en-title');
        $history->ru_title = $request->input('ru-title');
        $history->en_text = $request->input('en-text');
        $history->ru_text = $request->input('ru-text');
        $history->year = $request->year;
        $save = $history->save();

        if ($save) {
            return back()->with('success', 'История успешно добавлена!');
        } else {
            return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
        }
    }

    public function update(Request $request)
    {
        // validation
        $request->validate([
            'ru-title' => 'required|string|max:80',
            'en-title' => 'required|string|max:80',
            'ru-text' => 'required',
            'en-text' => 'required',
            'year' => 'required|numeric|digits:4',
        ]);
        // update news
        $history = History::find($request->id);
        $history->en_title = $request->input('en-title');
        $history->ru_title = $request->input('ru-title');
        $history->en_text = $request->input('en-text');
        $history->ru_text = $request->input('ru-text');
        $history->year = $request->year;
        $save = $history->save();

        if ($save) {
            return back()->with('success', 'История успешно изменена!');
        } else {
            return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
        }
    }

    public function delete(Request $request)
    {
        $history = History::find($request->id);
        $history->trashed = true;
        $save = $history->save();
        if ($save) {
            return redirect(route('dashboard.histories'))->with('success', 'История успешно удалена!');
        } else {
            return back()->with('fail', 'Упс... Что-то пошло не так попробуйте позже!');
        }
    }

    public function dashSearch(Request $request)
    {
        $keyword = $request->keyword;
        $locale = App::currentLocale();
        // get quantities
        $historiesQuantity = History::where('trashed', false)->count();
        // find result
        $histories = History::select(
            'id',
            $locale . '_title as title',
            'year',
            'trashed',
        )->where('trashed', false)->where($locale . '_title', 'like', '%' . $keyword . '%')
            ->orderBy('year', 'desc')->paginate(15);
        $rank = $histories->firstItem();

        return view('dashboard.pages.histories.index', compact('historiesQuantity', 'histories', 'rank', 'keyword'));
    }
}
