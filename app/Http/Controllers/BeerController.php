<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BeerController extends Controller
{
    public function show()
    {

    }

    public function create()
    {
        return view('beer.create');
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

        return redirect('/profile');
    }
}
