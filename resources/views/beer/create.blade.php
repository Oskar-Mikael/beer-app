@extends('layouts.app')

@section('content')
    <h1 class="my-20 text-3xl">
        Create Beer
    </h1>
    <form method="POST" action="{{ route('beer.store') }}">
        @csrf
        <label for="beer" class="text-lg">
            Beer Name
        </label>
        <br>
        <input type="text" name="beer" class="mb-4 w-1/5 outline-none pl-2">
        <br>
        <label for="rating" class="text-lg">
            Rating
        </label>
        <br>
        <input type="number" min="0" max="10" step="0.5" name="rating" class="mb-4 w-1/5 outline-none pl-2">
        <br>
        <label for="country" class="text-lg">
            Country
        </label>
        <br>
        <select name="country" class="mb-4 w-1/5 outline-none pl-2">
            <option hidden>
                -Country-
            </option>
            @foreach ($countries as $country)
                <option value="{{ $country->name }}">
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label for="type" class="text-lg">
            Beer Type
        </label>
        <br>
        <input type="text" name="type" class="mb-4 w-1/5 outline-none pl-2">
        <br>
        <label for="review" class="text-lg">
            Review
        </label>
        <br>
        <textarea name="review" class="resize-none w-1/4 h-60 outline-none pl-2"></textarea>
        <br>
        <button type="submit" class="text-lg mt-6 bg-yellow-700 px-2 py-1 rounded-md text-white">Add Beer</button>
    </form>
    @if (session()->has('success'))
        <p class="text-green-400">{{ session()->get('success') }}</p>
    @endif
@endsection
