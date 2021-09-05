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
    <table class="border-2 border-black text-center my-10">
        <tr>
            <th class="px-2">
                Beer
            </th>
            <th class="px-2">
                Rating
            </th>
            <th class="px-2">
                Country
            </th>
            <th class="px-2">
                Type
            </th>
        </tr>


        @foreach ($list->beer as $beer)
            <tr>
                <td>
                    {{ $beer->beer }}
                </td>
                <td>
                    {{ $beer->rating }}
                </td>
                <td>
                    {{ $beer->country }}
                </td>
                <td>
                    {{ $beer->type }}
                </td>
            </tr>
        @endforeach


    </table>

    <a href="{{ route('beer.create') }}">
        Can't find your beer?
    </a>
@endsection
