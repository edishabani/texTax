@extends('layouts.app')

@section('content')
    <h1>Categories</h1>

    @foreach ($categories as $category)
        <div>
            <h3>{{ $category->name }}</h3>
            <p>{{ $category->description }}</p>
            <a href="{{ route('categories.show', $category) }}">View Threads</a>
        </div>
        <hr>
    @endforeach
@endsection