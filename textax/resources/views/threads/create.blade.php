<div x-data="{ title: '', body: '' }">
    <form method="POST" action="{{ route('threads.store') }}">
        @csrf
        <input x-model="title" type="text" name="title" placeholder="Title">
        <textarea x-model="body" name="body" placeholder="Body"></textarea>
        <button type="submit">Create</button>
    </form>
</div>
