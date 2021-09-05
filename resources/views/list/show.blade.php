@extends('layouts.app')

@section('content')
    <div class="justify-center mx-auto">
        <h1 class="text-4xl my-20">
            {{ $list->title }}
        </h1>

        <form method="POST" action="{{ route('list.additem', $list->id) }}">
            @csrf
            <select name="beer" required>
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
            <br>
            <button type="submit" class="text-lg mt-6 bg-green-700 px-2 py-1 rounded-md text-white">
                Add Beer
            </button>
        </form>
        <div class="overflow-x-auto">
            <table style="border-spacing:0" class="mx-auto border-collapse w-full border-2 border-black text-center my-10">
                <tr class="border-black border-2 text-xl">
                    <th class="border-black border-r-2 px-4 w-1/4">
                        @sortablelink('beer')
                        <img class="w-4 float-right mt-2"
                            src="https://www.shareicon.net/data/2015/11/07/668285_arrows_512x512.png" />
                    </th>
                    <th class="border-black border-r-2 px-4">
                        @sortablelink('rating')
                        <img class="w-4 float-right mt-2"
                            src="https://www.shareicon.net/data/2015/11/07/668285_arrows_512x512.png" />
                    </th>
                    <th class="border-black border-r-2 px-4">
                        @sortablelink('country')
                        <img class="w-4 float-right mt-2"
                            src="https://www.shareicon.net/data/2015/11/07/668285_arrows_512x512.png" />
                    </th>
                    <th class="border-black border-r-2 px-4">
                        @sortablelink('type')
                        <img class="w-4 float-right mt-2"
                            src="https://www.shareicon.net/data/2015/11/07/668285_arrows_512x512.png" />
                    </th>
                </tr>
                @foreach ($listBeers as $beer)
                    <tr class="border-black border-2 text-lg">
                        <td class="border-black border-r-2 px-4 underline hover:no-underline">
                            <a href="{{ route('beer.show', $beer->id) }}">
                                {{ $beer->beer }}
                            </a>
                        </td>
                        <td class="border-black border-r-2 px-4">
                            {{ $beer->rating }}/10
                        </td>
                        <td class="border-black border-r-2 px-4">
                            {{ $beer->country }}
                        </td>
                        <td class="border-black border-r-2 px-4">
                            {{ $beer->type }}
                        </td>
                        <td class="border-black border-r-2 px-4 bg-blue-700">
                            <a href="{{ route('beer.edit', $beer->id) }}">
                                Edit
                            </a>
                        </td>
                        <td class="border-black border-r-2 px-4 bg-red-700">
                            <form method="POST" action="{{ route('list.removeitem', $list->id) }}">
                                @csrf
                                @method('DELETE')
                                <input name="beer" hidden value="{{ $beer->id }}" />
                                <button onclick="return confirm('Are you sure?')" type="submit">
                                    Remove
                                </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        @if (session()->has('success'))
            <p class="text-green-400 my-4">{{ Session::get('success') }}</p>
        @endif
        <button class="text-lg mt-6 bg-yellow-700 px-2 py-1 rounded-md text-white">
            <a href="{{ route('beer.create') }}">
                Can't find your beer?
            </a>
        </button>
    </div>
@endsection
