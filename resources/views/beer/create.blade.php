@extends('layouts.app')

@section('content')
    Create Beer
    <form method="POST" action="{{ route('beer.store') }}">
        @csrf
        <label for="beer">
            Beer Name
        </label>
        <input type="text" name="beer">
        <label for="rating">
            Rating
        </label>
        <input type="number" name="rating">
        <label for="country">
            Country
        </label>
        <input type="text" name="country">
        <label for="type">
            Beer Type
        </label>
        <input type="text" name="type">
        <label for="review">
            Review
        </label>
        <textarea name="review" style="resize:none"></textarea>
        < <button type="submit">Add Beer</button>
    </form>
    @if (session()->has('success'))
        <p class="text-green-400">{{ session()->get('success') }}</p>
    @endif
@endsection
