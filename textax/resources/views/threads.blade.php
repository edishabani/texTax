<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 gap-4">
        @foreach ($threads as $thread)
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-2xl font-bold mb-2">{{ $thread->title }}</h2>
                <p>{{ $thread->content }}</p>
            </div>
        @endforeach
    </div>
</div>


<div x-data="{ title: '', content: '' }">
    <form @submit.prevent="createThread">
        <input x-model="title" type="text" placeholder="Title">
        <textarea x-model="content" placeholder="Content"></textarea>
        <button type="submit">Create Thread</button>
    </form>
</div>
