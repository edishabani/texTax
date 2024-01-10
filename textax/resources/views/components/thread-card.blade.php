<div class="max-w-md mx-auto bg-blue-600 rounded-xl shadow-md overflow-hidden md:max-w-2xl m-4 flex justify-center items-center">
    <div class="md:flex">
        <div class="p-8 flex">
            <div x-data="{ upvoted: false, downvoted: false, upvotes: {{ $thread->upvotes }}, downvotes: {{ $thread->downvotes }} }" class="mr-4 flex flex-col items-center justify-start">
                <button @click="if (upvoted) { upvotes--; $dispatch('unvote-thread', { id: {{ $thread->id }} }); upvoted = false; } else if (!downvoted) { upvotes++; $dispatch('upvote-thread', { id: {{ $thread->id }} }); upvoted = true; }" :disabled="downvoted" class="btn btn-primary mb-2">&#x25B2;</button>
                <span x-text="upvotes"></span>
                <button @click="if (downvoted) { downvotes--; $dispatch('unvote-thread', { id: {{ $thread->id }} }); downvoted = false; } else if (!upvoted) { downvotes++; $dispatch('downvote-thread', { id: {{ $thread->id }} }); downvoted = true; }" :disabled="upvoted" class="btn btn-primary mt-2">&#x25BC;</button>
                <span x-text="downvotes"></span>
            </div>
            <div>
                <a href="{{ route('threads.show', $thread) }}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $thread->title }}</a>
                <p class="mt-2 text-gray-200">{{ $thread->body }}</p>
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
</div>
