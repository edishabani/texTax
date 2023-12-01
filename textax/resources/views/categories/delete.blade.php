@extends('layouts.app')

@section('content')
    <h1>Delete Category</h1>

    <p>Are you sure you want to delete the category "{{ $category->name }}"?</p>

    <form method="post" action="{{ route('categories.destroy', $category) }}">
        @csrf
        @method('DELETE')

        <button type="submit">Delete Category</button>
    </form>
@endsection
