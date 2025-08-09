@extends('layouts.app')

@section('content')
    <h2 class="
        md:text-3xl text-xl md:text-left text-center mt-20">
        Profile of {{ Auth::user()->name }}
    </h2>
    <button class="text-lg mt-6 bg-green-700 px-2 py-1 rounded-md text-white">
        <a href="{{ route('list.create') }}">
            Add Beer list
        </a>
    </button>
    <h2 class="my-10 text-2xl">
        Beer Lists
    </h2>
    <table class="border-black border-2 text-center">
        <tr class="border-black border-2 text-xl">
            <th class="border-black border-r-2 px-4">
                List name
            </th>
            <th class="px-4">
                Beer Count
            </th>
        </tr>
        @foreach (Auth::user()->lists as $list)
            <tr class="border-black border-2 text-lg">
                <td class="border-black border-r-2 px-4 underline hover:no-underline">
                    <a href="{{ route('list.show', $list->id) }}">
                        {{ $list->title }}
                    </a>
                </td>
                <td class="px-4">
                    {{ $list->beer()->count() }}
                </td>
            <tr>
        @endforeach
    </table>
    @if (session()->has('success'))
        <p class="text-green-400">{{ session()->get('success') }}</p>
    @endif
@endsection
