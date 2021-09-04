@extends('layouts.app')

@section('content')
    <div class="container">
        Profile
    </div>
    <a href="{{ route('list.create') }}">
        Add Beer list
    </a>
    @foreach (Auth::user()->lists as $list)
        <a href="{{ route('list.show', $list->id) }}">
            {{ $list->title }}
        </a>
    @endforeach
@endsection
