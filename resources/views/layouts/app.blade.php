<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
</head>
<body style="background-color:#E6EED6" class="font-sans flex flex-col min-h-screen items-center">
    <x-header />

    <main class="flex-grow w-4/5 lg:w-3/5 py-10">
        @yield('content')
    </main>

    <x-footer />
    @stack('scripts')

    <script src="{{ asset('js/components/header.js') }}"></script>
</body>
</html>