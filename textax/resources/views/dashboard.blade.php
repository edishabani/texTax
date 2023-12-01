@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Add your dashboard content here -->
                <div class="bg-gray-200 p-4 rounded-md">
                    <h3 class="text-lg font-semibold mb-2">Widget 1</h3>
                    <p>Your content goes here...</p>
                </div>

                <div class="bg-gray-200 p-4 rounded-md">
                    <h3 class="text-lg font-semibold mb-2">Widget 2</h3>
                    <p>Your content goes here...</p>
                </div>

                <div class="bg-gray-200 p-4 rounded-md">
                    <h3 class="text-lg font-semibold mb-2">Widget 3</h3>
                    <p>Your content goes here...</p>
                </div>
            </div>
        </div>
    </div>
@endsection
