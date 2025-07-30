<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 my-0">
            <div>
                <h1>
                    <a href="/">
                        <i class="fa-solid fa-hat-wizard fa-5x" style="color: #1d0d96;"></i>
                    </a>
                </h1>
            </div>
            <div class="card">
                <!-- Damit ich nicht zur Startseite wechseln muss, um das Passwort nachzuschauen, habe ich es hier platziert -->
                <div class="card-header fw-bold">Weil das ein Übungsprojekt ist, hier ein kleiner Tipp für den Login:</div>
                <div class="card-header">Administrator: magier@magic.com : LaravelIstSchmerz</div>
                <div class="card-header">Eingeloggter Benutzer: user@magic.com : password123</div>
                <div class="card-header">Blockierte Benutzer (inactive): blocked@magic.com : password123</div>

            </div>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
