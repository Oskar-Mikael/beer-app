@extends('layouts.app')

@section('content')
    Add list
    <form method="POST" action="{{ route('list.store') }}">
        @csrf
        <label for="title">
            List Name
        </label>
        <input class="bg-gray-300 border-black border-1" type="text" name="title">
        @if ($errors->has('title'))
                    <span class="text-red-600" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
        <button type="submit">
            Add List
        </button>
    </form>
@endsection
