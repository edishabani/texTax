<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-center transition-all duration-500 ease-in-out">
            {{ __('Welcome to TexTax! An interactive and minimalistic discussing platform regarding latest news about technologies!') }}
        </h2>
    </x-slot>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="py-12 transition-all duration-200 ease-in-out">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-all duration-500 ease-in-out">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <a href="{{ route('threads.create') }}" class="ml-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all duration-500 ease-in-out">
                        Create Thread
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
