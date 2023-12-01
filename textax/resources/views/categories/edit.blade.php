@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>

    <form method="post" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PATCH')

        <label for="name">Category Name:</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required>

        {{-- Add other fields as needed --}}

        <button type="submit">Update Category</button>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
