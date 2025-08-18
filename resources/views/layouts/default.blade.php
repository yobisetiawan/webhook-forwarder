<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Styles -->
    @stack('styles')
</head>

<body>

    <main>
        @yield('content')
    </main>
    <footer class="text-center pt-10">
        <p>&copy; {{ date('Y') }} My App. All rights reserved.</p>
    </footer>
    <!-- Scripts -->
    @stack('scripts')
</body>

</html>
