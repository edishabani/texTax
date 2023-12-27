@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <select name="filter" onchange="this.form.submit()">
            <!-- Add your filter options here -->
        </select>

        <select name="sort" onchange="this.form.submit()">
            <!-- Add your sort options here -->
        </select>
    </div>

    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4">Threads</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($threads as $thread)
                <div class="bg-white rounded-lg shadow-md p-4" x-data="{ open: false }">
                    @if ($thread->user)
                        <div class="flex items-center mb-2">
                            <img src="{{ $thread->user->avatar }}" alt="{{ $thread->user->name }}" class="w-10 h-10 rounded-full mr-2">
                            <h2 class="text-2xl font-bold">
                                <a href="{{ route('threads.show', $thread) }}" class="text-blue-500 hover:underline">
                                    {{ $thread->title }}
                                </a>
                            </h2>
                        </div>
                    @endif
                    <p class="text-gray-700 line-clamp-3">{{ $thread->body }}</p>
                    <button @click="open = !open" class="mt-2 text-blue-500">Read More</button>
                </div>
            @endforeach
        </div>
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
