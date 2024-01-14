@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Delete Category</h1>
        <p>Are you sure you want to delete this category?</p>
        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
