@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">{{ $thread->title }}</h1>

        <div class="bg-white rounded-lg shadow-md p-4">
            <p class="text-gray-700">{{ $thread->body }}</p>
            <p class="text-sm text-gray-500">Created at: {{ $thread->created_at->format('M d, Y') }}</p>
        </div>
    </div>
@endsection
