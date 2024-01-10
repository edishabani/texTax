@vite(['resources/css/app.css', 'resources/js/app.js'])

<div x-data="{ thread: @json($thread), comments: [] }" class="container mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 x-text="thread.title" class="text-2xl font-bold mb-2"></h2>
        <p x-text="thread.content" class="mb-4"></p>

        <div x-data="{ comment: '', errors: {} }">
            <form @submit.prevent="addComment" class="mb-4">
                <textarea x-model="comment" placeholder="Add a comment" class="w-full p-2 rounded border"></textarea>
                <p x-show="errors.comment" x-text="errors.comment" class="text-red-500"></p>
                <button type="submit" class="mt-2 px-4 py-2 rounded bg-blue-500 text-white">Submit</button>
            </form>
        </div>

        <div>
            <template x-for="comment in comments" :key="comment.id">
                <div class="mb-2">
                    <p x-text="comment.content" class="border p-2 rounded"></p>
                </div>
            </template>
        </div>
    </div>

    <div x-data="{ votes: 0 }" class="mt-4">
        <button class="upvote-button" data-comment-id="{{ $comment->id }}">Upvote</button>
        <button class="downvote-button" data-comment-id="{{ $comment->id }}">Downvote</button>
        <p>Votes: <span x-text="votes"></span></p>
    </div>

    <div x-data="{ tags: [] }" class="mt-4">
        <form @submit.prevent="addTag">
            <input x-model="newTag" type="text" placeholder="New tag" class="w-full p-2 rounded border">
            <button type="submit" class="mt-2 px-4 py-2 rounded bg-blue-500 text-white">Add Tag</button>
        </form>
        <div>
            <template x-for="tag in tags" :key="tag">
                <span x-text="tag" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2"></span>
            </template>
        </div>
    </div>
</div>

<script>
window.addComment = function(event) {
    event.preventDefault();
    if (!this.comment) {
        this.errors.comment = 'Comment cannot be empty';
    } else {
        // Submit the comment...
    }
};
</script>
