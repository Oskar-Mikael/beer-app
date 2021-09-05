<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\BeerList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BeerListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    public function show(BeerList $list)
    {
        $beers = Beer::all();

        $listBeers = $list->beer()->sortable()->paginate(100);

        return view('list.show', compact('list', 'beers', 'listBeers'));
    }

    public function create()
    {
        return view('list.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $list = new BeerList;
        $list->title = $request->title;
        $list->user_id = auth()->user()->id;

        $list->save();

        return redirect("/list/" . $list->id);
    }

    public function addItem(Request $request, $id)
    {
        $beerId = $request->beer;
        $list = BeerList::findOrFail($id);

        $list->beer()->attach($beerId);

        return back()->with('success', 'Beer added');
    }

    public function removeItem(Request $request, $id)
    {
        $beerId = $request->beer;
        $list = BeerList::findOrFail($id);

        $list->beer()->detach($beerId);

        return back()->with('success', 'Beer deleted');
    }
}
