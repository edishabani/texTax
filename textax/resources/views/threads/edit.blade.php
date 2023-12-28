@vite(['resources/css/app.css', 'resources/js/app.js'])

@extends('layouts.thread')
@section('content')
<form method="POST" action="{{ route('threads.update', $thread) }}">
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="bg-white rounded-lg shadow-md p-8 max-w-2xl">
            <h1 class="text-4xl font-bold mb-4 text-center text-blue-500">Edit Thread</h1>
            <hr class="mb-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="title"></label>
                    <input type="text" id="title" name="title" value="{{ $thread->title }}" required>
                </div>
                <div>
                    <label for="body"></label>
                    <textarea id="body" name="body" required>{{ $thread->body }}</textarea>
                </div>
            <hr class="my-4">
            <div class="mt-4 flex justify-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Update Thread</button>
                <a href="{{ url()->previous() }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Back
                </a>
            </div>
        </div>
    </div>
    </form>
@endsection
