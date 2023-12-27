@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Explore</h1>

        @foreach ($categories as $category => $subcategories)
            <h2>{{ $category }}</h2>

            <ul>
                @foreach ($subcategories as $subcategory)
                    <li>{{ $subcategory }}</li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection
