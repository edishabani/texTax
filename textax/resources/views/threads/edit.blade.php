<div x-data="{ title: '{{ $thread->title }}', body: '{{ $thread->body }}' }">
    <form method="POST" action="{{ route('threads.update', $thread) }}">
        @csrf
        @method('PUT')
        <input x-model="title" type="text" name="title" placeholder="Title">
        <textarea x-model="body" name="body" placeholder="Body"></textarea>
        <button type="submit">Update</button>
    </form>
</div>
