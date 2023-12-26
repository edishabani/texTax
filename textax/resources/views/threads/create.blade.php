<div x-data="{ title: '', body: '' }">
    <form method="POST" action="{{ route('threads.store') }}">
    @csrf
        <input x-model="title" type="text" name="title" placeholder="Title">
        <textarea x-model="body" name="body" placeholder="Body"></textarea>
        <button type="submit">Create</button>
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
