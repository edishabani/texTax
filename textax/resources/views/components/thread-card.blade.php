<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl m-4 flex justify-center items-center">
    <div class="md:flex">
        <div class="p-8">
            <a href="{{ route('threads.show', $thread) }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $thread->title }}</a>
            <p class="mt-2 text-gray-500">{{ $thread->body }}</p>
            @if (request()->is('my-threads'))
                <form action="{{ route('threads.destroy', $thread->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </div>


    </div>
</div>
