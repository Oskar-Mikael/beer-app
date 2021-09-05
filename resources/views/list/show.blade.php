@extends('layouts.app')

@section('content')
   {{ $list->title }}

<form method="POST" action="{{ route('list.additem', $list->id) }}">
    @csrf
    <select name="beer">
        <option hidden>
            -Add Beer-
        </option>
        @foreach ($beers as $beer)
        <option value="{{ $beer->id }}">
            <div class="w-20">
                <p>
                    {{ $beer->beer }}
                </p>
                <br>
                <p>
                    Rating: {{ $beer->rating }}
                </p>
            </div>
        </option>
        @endforeach
    </select>
    <button type="submit">
        Add beer
    </button>
</form>
<a href="{{ route('beer.create') }}">
    Can't find your beer?
</a>
@endsection
