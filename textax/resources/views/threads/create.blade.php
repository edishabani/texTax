@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="flex justify-center items-center h-screen bg-blue-100" x-data="{ title: '', body: '' }">
    <form class="bg-white p-6 rounded shadow-md" method="POST" action="{{ route('threads.store') }}">
    @csrf
        <input class="block w-full mb-4 p-2 border rounded" x-model="title" type="text" name="title" placeholder="Title">
        <textarea class="block w-full mb-4 p-2 border rounded" x-model="body" name="body" placeholder="Body"></textarea>
        <button class="block w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600" type="submit">Create</button>
    </form>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
