<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Konfirmasi Seller')</title>
    <style>
        :root {
            --primary-color: #A9684C;
            --secondary-color: #F8F4E9;
            --text-dark: #333;
            --text-light: #fff;
            --sidebar-width: 280px;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* --- Navbar Styles (Sama seperti Home) --- */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            border-bottom: 1px solid #eee;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
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
            width: 250px;
        }

        .nav-icons > * {
            margin-left: 15px;
            cursor: pointer;
            font-size: 20px;
            color: var(--text-dark);
        }

        /* --- Main Layout: Sidebar and Content --- */
        .main-layout {
            display: flex;
            min-height: calc(100vh - 65px); /* Kurangi tinggi navbar */
        }

        /* Sidebar Kiri */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--secondary-color);
            padding: 20px 0;
            flex-shrink: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
            padding-top: 0;
        }

        .sidebar h1 {
            color: var(--primary-color);
            font-size: 20px;
            padding: 20px;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            margin-top: 0;
            line-height: 1.2;
            font-weight: 700;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 16px;
            transition: background-color 0.2s;
        }

        .sidebar-menu a:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .sidebar-menu a.active {
            background-color: rgba(0, 0, 0, 0.08);
            border-right: 4px solid var(--primary-color);
            font-weight: bold;
        }

        .sidebar-menu .menu-separator {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar-menu i {
            margin-right: 10px;
            font-size: 18px;
        }

        /* Konten Utama */
        .content-area {
            flex-grow: 1;
            padding: 30px;
            background-color: white;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Simulasikan ikon (gunakan SVG atau FontAwesome di aplikasi nyata) -->
    @php
        $icons = [
            'cart' => '🛒', 'chat' => '💬', 'search' => '🔍', 'user' => '👤',
            'dashboard' => '🏠', 'data_seller' => '📝', 'data_customer' => '👥', 'settings' => '⚙️', 'delete_account' => '❌'
        ];
        // Fungsi simulasi routeIs
        function routeIs($name) {
            // Dalam aplikasi nyata, ini menggunakan: return request()->routeIs($name);
            // Simulasi status aktif untuk halaman Data new Customer
            $currentRoute = request()->routeIs('register.customer') ? 'register.customer' : 'admin.seller.confirmation';
            return $currentRoute == $name;
        }
    @endphp

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-links">
            <a href="{{ route('home') ?? '#' }}">Beranda</a>
            <a href="#">Produk</a>
        </div>
        <div style="display: flex; align-items: center;">
            <div style="display: flex; gap: 10px;">
                <span class="nav-icons" style="font-size: 20px;">{{ $icons['cart'] }}</span>
                <span class="nav-icons" style="font-size: 20px;">{{ $icons['chat'] }}</span>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search for a product">
                <span class="nav-icons" style="margin-left: 10px;">{{ $icons['search'] }}</span>
            </div>
            <div class="nav-icons" style="margin-left: 15px;">
                <span style="font-size: 20px;">{{ $icons['user'] }}</span>
            </div>
        </div>
    </nav>

    <div class="main-layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <h1>ECOMMERCE KERAJINAN LOKAL INDONESIA</h1>

            <div class="sidebar-menu">
                <!-- Data new Seller -->
                <a href="{{ route('admin.dashboard') ?? '#' }}"
                   class="{{ routeIs('admin.dashboard') ? 'active' : '' }}">
                   <i aria-hidden="true">{{ $icons['dashboard'] }}</i> Dashboard
                </a>

                <a href="{{ route('admin.seller.confirmation') ?? '#' }}"
                   class="{{ routeIs('admin.seller.confirmation') ? 'active' : '' }}">
                   <i aria-hidden="true">{{ $icons['data_seller'] }}</i> Data new Seller
                </a>

                <!-- NEW: Data new Customer -->
                <a href="{{ route('admin.customer.list') ?? '#' }}"
                   class="{{ routeIs('admin.customer.list') ? 'active' : '' }}">
                   <i aria-hidden="true">{{ $icons['data_customer'] }}</i> Data new Customer
                </a>

                <div class="menu-separator"></div>

                <!-- Pengaturan -->
                <a href="{{ route('settings') ?? '#' }}"
                   class="{{ routeIs('settings') ? 'active' : '' }}">
                   <i aria-hidden="true">{{ $icons['settings'] }}</i> Pengaturan
                </a>

                <!-- Delete Account -->
                <a href="{{ route('delete.account') ?? '#' }}"
                   class="{{ routeIs('delete.account') ? 'active' : '' }}">
                   <i aria-hidden="true">{{ $icons['delete_account'] }}</i> Delete Account
                </a>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="content-area">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
</body>
</html>
