<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'App' }}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="font-sans antialiased">
    <x-navbar />

    <main class="py-4">
        {{ $slot }}
    </main>


</body>
</html>
