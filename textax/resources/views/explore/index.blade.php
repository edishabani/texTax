@extends('layouts.app')

@section('content')

    <div class="container flex items-center">

        @foreach ($categories as $categoryName => $subcategories)
            @foreach ($subcategories as $subcategory)
                <a href="{{ route('categories.show', $subcategory) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mx-auto items-center justify-cetner">{{ $subcategory }}</a>
            @endforeach
        @endforeach
    </div>
@endsection
