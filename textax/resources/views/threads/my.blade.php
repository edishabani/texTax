@extends('layouts.app')

@section('content')
    @csrf
    <div class="container">
        <h1 class="text-blue-300">My Threads</h1>

        @foreach ($threads as $thread)
            <div>
                <h2>{{ $thread->title }}</h2>
                <p>{{ $thread->body }}</p>
            </div>
        @endforeach
    </div>
@endsection
