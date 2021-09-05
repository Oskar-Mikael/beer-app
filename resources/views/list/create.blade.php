@extends('layouts.app')

@section('content')
    <h1 class="my-20 text-3xl">
        Add list
    </h1>
    <form method="POST" action="{{ route('list.store') }}">
        @csrf
        <label for="title" class="text-lg">
            List Name
        </label>
        <input class="bg-gray-300 border-black border-2" type="text" name="title">
        @if ($errors->has('title'))
            <span class="text-red-600" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
        <br>
        <button type="submit" class="text-lg mt-6 bg-green-700 px-2 py-1 rounded-md text-white">
            Add List
        </button>
    </form>
@endsection
