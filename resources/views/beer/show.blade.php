@extends('layouts.app')

@section('content')
    <h1 class="text-3xl">
       {{ $beer->beer }}
    </h1>
    <p class="text-xl my-4">
        Rating: <br>
        <span class="text-white"> {{ $beer->rating }} </span>
    </p>
    <p class="text-xl">
        Country: <br>
        <span class="text-white"> {{ $beer->country }} </span>
    </p>
    <p class="text-xl my-4">
        Type: <br>
        <span class="text-white"> {{ $beer->type }} </span>
    </p>
    <p class="text-xl">
        Review: <br>
        <span class="text-white"> {{ $beer->review ?? '[No review added]'  }} </span>
    </p>




    <form class="mt-10" method="POST" action="{{ route('beer.destroy', $beer->id) }}">
        @csrf
        @method('DELETE')
        <button class="bg-red-700 rounded-md px-2 py-1" type="submit" onclick="return confirm('Are you sure?')">
            Delete beer
        </button>
    </form>
@endsection
