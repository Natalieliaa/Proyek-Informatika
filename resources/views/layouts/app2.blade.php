<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-commerce Kerajinan Lokal Indonesia')</title>

    <style>
        :root {
            --primary-color: #A9684C; /* Cokelat utama */
            --background-color: #F8F4E9; /* Warna krem dari gambar */
            --button-dark: #8B4513; /* Cokelat gelap untuk tombol */
            --text-shadow-color: #e0d9c9; /* Warna bayangan teks */
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>

    @yield('styles')
</head>
<body>

    @yield('content')

    @yield('scripts')
</body>
</html>
