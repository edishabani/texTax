@extends('layouts.thread')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white rounded-lg shadow-md p-4 max-w-md">
            <h1 class="text-4xl font-bold mb-4 text-center">{{ $thread->title }}</h1>
            <p class="text-gray-700">{{ $thread->body }}</p>
            <p class="text-sm text-gray-500 text-center">Created at: {{ $thread->created_at->format('M d, Y H:i') }}</p>
        </div>
    </div>
@endsection
