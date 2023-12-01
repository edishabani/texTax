
@extends('layouts.app')

@section('content')
    <h1>Threads</h1>

    @foreach ($threads as $thread)
        <div>
            <h3>{{ $thread->title }}</h3>
            <p>{{ Str::limit($thread->content, 150) }}</p>
            <a href="{{ route('threads.show', $thread) }}">Read more</a>
        </div>
        <hr>
    @endforeach
@endsection
