<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-commerce Kerajinan Lokal Indonesia')</title>

    <style>
        :root {
            --primary-color: #A9684C; /* Warna cokelat utama */
            --secondary-color: #F8F4E9; /* Warna krem background */
            --text-dark: #333;
            --text-light: #fff;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .web-container {
            width: 100%;
            max-width: 1200px;
            background-color: var(--text-light);
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* --- Navbar Styles --- */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            border-bottom: 1px solid #eee;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            margin-right: 20px;
            font-weight: 600;
        }

        .search-bar {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 5px 15px;
        }

        .search-bar input {
            border: none;
            outline: none;
            padding: 5px;
            margin-right: 10px;
            width: 250px;
        }

        .nav-icons > * {
            margin-left: 15px;
            cursor: pointer;
            font-size: 20px;
        }

        .icon {
            /* Placeholder for icons */
            width: 20px;
            height: 20px;
            display: inline-block;
            background-color: #999; /* Ganti dengan ikon SVG/Font Awesome */
            border-radius: 50%;
        }

        /* Ikon spesifik (simulasi) */
        .icon-cart { background-color: #8B4513; }
        .icon-chat { background-color: #3CB371; }
        .icon-search { background-color: #000; }
        .icon-user { background-color: #A9684C; }
    </style>

    @yield('styles')
</head>
<body>
    <div class="web-container">
        <nav class="navbar">
            <div class="nav-links">
                <a href="{{ route('home') ?? '#' }}">Beranda</a>
                <a href="#">Produk</a>
            </div>
            <div style="display: flex; align-items: center;">
                <div class="nav-icons" style="display: flex; gap: 10px;">
                    <span class="icon icon-cart"></span> <span class="icon icon-chat"></span> </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search for a product">
                    <span class="icon icon-search"></span>
                </div>
                <div class="nav-icons">
                    <span class="icon icon-user"></span> </div>
            </div>
        </nav>

        @yield('content')

        </div>

    @yield('scripts')
</body>
</html>
