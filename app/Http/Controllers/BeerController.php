<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BeerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Beer $beer)
    {
        return view('beer.show', compact('beer'));
    }

    public function create()
    {
        $countries = DB::table('countries')->get();
        return view('beer.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'beer' => 'required',
            'rating' => 'required',
            'country' => 'required',
            'type' => 'required',
        ]);

        $beer = new Beer;

        $beer->beer = $request->beer;
        $beer->rating = $request->rating;
        $beer->country = $request->country;
        $beer->type = $request->type;
        $beer->review = $request->review;

        $beer->save();

        return back()->with('success', 'Beer added!');
    }

    public function edit(Beer $beer)
    {
        $countries = DB::table('countries')->get();
        return view('beer.edit', compact('beer', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'beer' => 'required',
            'rating' => 'required',
            'country' => 'required',
            'type' => 'required',
        ]);

        $beer = Beer::findOrFail($id);
        $beer->beer = $request->beer;
        $beer->rating = $request->rating;
        $beer->country = $request->country;
        $beer->type = $request->type;
        $beer->review = $request->review;

        $beer->save();

        return back()->with('success', 'Beer updated!');
    }

    public function destroy($id)
    {
        $beer = Beer::findOrFail($id);

        $beer->list()->detach();

        $beer->delete();

        return view('profile')->with('success', 'Beer deleted');
    }
}
