<!-- resources/views/threads/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Thread') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('threads.update', $thread) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $thread->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="content">{{ __('Content') }}</label>
                                <textarea name="content" id="content" class="form-control" required>{{ $thread->content }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update Thread') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
