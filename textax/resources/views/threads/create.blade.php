<!-- resources/views/threads/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Thread') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('threads.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="content">{{ __('Content') }}</label>
                                <textarea name="content" id="content" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Create Thread') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
