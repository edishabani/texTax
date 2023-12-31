@vite(['resources/css/app.css', 'resources/js/app.js'])

<div x-data="{ user: @json($user) }">
    <h2 x-text="user.name"></h2>
    <p>Threads: <span x-text="user.threads.length"></span></p>
    <p>Comments: <span x-text="user.comments.length"></span></p>
</div>

<div class="container mx-auto px-4">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-2">User Name</h2>
        <p>User Bio</p>
    </div>
    <!-- ... -->
</div>
