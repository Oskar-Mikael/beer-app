<?php

namespace App\Http\Controllers;

use App\Models\BeerList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeerListController extends Controller
{
    public function show(BeerList $list)
    {

        return view('list.show', compact('list'));
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

        return redirect('/profile');
    }
}
