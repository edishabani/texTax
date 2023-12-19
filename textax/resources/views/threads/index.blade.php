@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Threads</h1>

        @foreach ($threads as $thread)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $thread->title }}</h3>
                </div>

                <div class="panel-body">
                    {{ $thread->body }}
                </div>
            </div>
        @endforeach

        {{ $threads->links() }}
    </div>
@endsection
