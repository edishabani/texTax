@extends('layouts.app')

@section('content')
    <h1>Create Category</h1>

    <form method="post" action="{{ route('categories.store') }}">
        @csrf

        <label for="name">Category Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        {{-- Add other fields as needed --}}

        <button type="submit">Create Category</button>
    </form>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
