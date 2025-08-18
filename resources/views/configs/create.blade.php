<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body>
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4 pt-6">Create Configs</h1>



        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/configs" method="post">
            @csrf
            <div class="mb-4">
                <label for="from_url" class="block text-sm font-medium text-gray-700">From URL</label>
                <input type="text" name="from_domain_url" id="from_url" class="mt-1 block w-full border p-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            </div>
            <div class="mb-4">
                <label for="to_url" class="block text-sm font-medium text-gray-700">To URL</label>
                <input type="text" name="to_domain_url" id="to_url" class="mt-1 block w-full border p-3 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Config</button>
        </form>

    </div>
</body>

</html>
