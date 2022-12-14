<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Recipes') }}</title>

    <!-- Styles -->
    @vite(['resources/sass/app.scss'])

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container-fluid d-flex flex-column min-vh-100 topmost-container">
        <x-header />

        <main class="mb-5">
            {{ $slot }}
        </main>

        <x-footer />
    </div>
</body>
</html>
