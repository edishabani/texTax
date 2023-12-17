<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textax</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="node_modules/alpinejs/dist/alpine.js" defer></script>
    <script>
        function login() {
            axios.post('/login', {
                email: this.email,
                password: this.password,
            })
            .then(function (response) {
                // The request was successful
                console.log(response.data);

                // Store the user's information in localStorage
                localStorage.setItem('user', JSON.stringify(response.data.user));

                // Redirect the user to a different page
                window.location.href = '/dashboard';
            })
            .catch(function (error) {
                // The request failed
                console.log(error);

                // Display an error message to the user
                alert('Login failed');
            });
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4" id="app" x-data>
        <!-- This is where you can start using Alpine.js -->
        <header x-text="'Welcome to Textax'"></header>
        <nav>
            <a href="{{ route('home') }}">Home</a>
            <!-- Add more links as needed -->
        </nav>

        <div x-data="{ email: '', password: '' }" class="w-full max-w-xs mx-auto mt-20">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input x-model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input x-model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                </div>
                <div class="flex items-center justify-between">
                    <button @click="login()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Sign In
                    </button>
                </div>
            </form>
        </div>

        <!-- This is where your page content will be injected -->
        @yield('content')
    </div>
</body>
</html>
