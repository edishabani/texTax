<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <h1>Categories</h1>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category }}</li>
        @endforeach
    </ul>
    <div>
        <a href="/categories/create">Create</a>
    </div>

</div>
</body>
</html>
