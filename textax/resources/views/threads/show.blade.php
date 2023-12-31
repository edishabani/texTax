@extends('layouts.thread')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <!-- Display the thread -->
        <h1 class="text-3xl font-bold mb-4 text-center text-blue-500">{{ $thread->title }}</h1>
        <p class="text-lg text-gray-700 mb-4">{{ $thread->body }}</p>
        <p class="text-sm text-gray-500 text-center mb-4">Created at: {{ $thread->created_at->format('M d, Y H:i') }}</p>
        <!-- Go Back Button -->
        <a href="{{ route('dashboard') }}" class="mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Go Back to Dashboard
        </a>
        <a href="{{ route('threads.edit', $thread->id) }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4">
            Edit Thread
        </a>

        <hr class="my-8">

        <!-- Add Comment -->
        <form action="{{ route('comments.store', $thread->id) }}" method="POST" class="mt-8">
            @csrf
            <textarea name="body" class="w-full p-2 rounded border shadow-sm" placeholder="Write your comment here..."></textarea>
            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit Comment
            </button>
        </form>

        <hr class="my-8">

        <!-- Display existing comments -->
        <h2 class="text-2xl font-bold mb-4 text-center text-blue-500">Comments</h2>
        @foreach ($thread->comments as $comment)
            <div class="mb-4">
                <p class="text-lg text-gray-700">{{ $comment->body }}</p>
                <p class="text-sm text-gray-500">Created at: {{ $comment->created_at->format('M d, Y H:i') }}</p>
            </div>
        @endforeach
    </div>
@endsection
