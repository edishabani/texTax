
@extends('layouts.app')

@section('content')
    <h1>{{ $thread->title }}</h1>
    <p>{{ $thread->content }}</p>

    <h2>Comments</h2>
    <!-- Display comments for the thread -->

    <form action="{{ route('comments.store', $thread) }}" method="post">
        @csrf
        <textarea name="body" rows="3" placeholder="Add a comment"></textarea>
        <button type="submit">Post Comment</button>
    </form>
@endsection