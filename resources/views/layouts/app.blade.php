<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Kerajinan Lokal Indonesia</title>
    <style>
        /* --- Variabel Warna --- */
        :root {
            --primary-color: #A9684C; /* Warna cokelat utama */
            --secondary-color: #F8F4E9; /* Warna krem background */
            --text-dark: #333;
            --text-light: #fff;
            --accent-color: #8B4513; /* Cokelat Tua */
        }

        /* --- Global Styles --- */
        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--secondary-color); /* Menggunakan krem sebagai background utama */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Ubah ke flex-start agar konten diletakkan di atas */
            min-height: 100vh;
        }

        .web-container {
            width: 100%;
            max-width: 1200px;
            background-color: var(--text-light);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 12px;
            min-height: 100vh;
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
            cursor: pointer;
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
            width: 200px; /* Disesuaikan agar responsif */
        }

        .nav-icons > * {
            margin-left: 15px;
            cursor: pointer;
            font-size: 20px;
        }

        .icon {
            width: 20px;
            height: 20px;
            display: inline-flex; /* Menggunakan flex untuk ikon */
            align-items: center;
            justify-content: center;
            background-color: #999;
            border-radius: 50%;
            color: var(--text-light);
            font-size: 14px;
        }
        .icon-cart { background-color: #8B4513; }
        .icon-chat { background-color: #3CB371; }
        .icon-search { background-color: #000; }
        .icon-user { background-color: var(--primary-color); }
        .nav-right-section { display: flex; align-items: center; }

        /* --- Hero Section Styles (Home Page) --- */
        .hero-section {
            background-color: var(--secondary-color);
            display: flex;
            padding: 50px 30px;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .hero-text h1 {
            color: var(--primary-color);
            font-size: 40px; /* Sedikit disesuaikan untuk layar kecil */
            line-height: 1.1;
            max-width: 450px;
            margin-bottom: 20px;
        }

        .hero-button {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            cursor: pointer;
        }

        .hero-slider {
            display: flex;
            gap: 15px;
            align-items: center;
            position: relative;
        }

        .slider-image {
            width: 120px; /* Disesuaikan */
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        .slider-image.main {
            width: 200px;
            height: 250px;
        }

        .slider-control {
            position: absolute;
            top: 50%;
            right: 280px; /* Posisi relatif terhadap slider */
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
        }

        /* Memberikan efek tumpukan 3D */
        .hero-slider img:nth-child(1) { transform: rotate(-5deg); z-index: 2; margin-top: 10px; }
        .hero-slider img:nth-child(2) { transform: rotate(0deg); z-index: 3; }
        .hero-slider img:nth-child(3) { transform: rotate(5deg); z-index: 2; margin-top: 10px; }
        .hero-slider img:nth-child(4) { transform: rotate(10deg); z-index: 1; margin-top: 20px; }

        .slider-control {
            display: none; /* Menyembunyikan kontrol slider untuk desain statis */
        }

        /* --- Product Grid Styles --- */
        .product-grid {
            padding: 30px;
        }
        .grid-title {
            font-size: 24px;
            color: var(--primary-color);
            margin-bottom: 20px;
            border-left: 5px solid var(--primary-color);
            padding-left: 10px;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Responsif */
            gap: 20px;
            margin-top: 20px;
        }

        .product-card {
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            background: #fff;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .product-card p {
            margin: 5px 0;
            font-size: 14px;
        }

        .product-card .product-price {
            font-weight: bold;
            color: var(--accent-color);
            font-size: 16px;
        }
        .buy-button {
            background-color: var(--primary-color);
            color: var(--text-light);
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.2s;
        }
        .buy-button:hover {
            background-color: #8B4513;
        }

        /* --- Auth Page Styles (Login/Register) --- */
        .auth-page {
            background-color: var(--secondary-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: absolute; /* Absolut untuk menutupi container */
            top: 0;
            left: 0;
            width: 100%;
            min-height: 100vh;
            z-index: 10;
        }

        /* Container untuk cropping logo */
        .logo-wrapper {
            width: 280px;
            height: 220px; /* Tinggi disesuaikan untuk menyembunyikan watermark */
            overflow: hidden;
            margin-bottom: 30px;
        }

        .logo-handmade {
            width: 100%;
            height: auto;
            /* mix-blend-mode: multiply untuk menghilangkan latar putih */
            mix-blend-mode: multiply;
            box-shadow: none;
            filter: drop-shadow(4px 4px 6px rgba(0, 0, 0, 0.3));
            /* Tidak perlu margin-bottom di sini lagi */
        }

        .auth-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 80%;
            max-width: 800px;
        }

        .welcome-text, .ecommerce-text {
            font-size: 36px; /* Disesuaikan agar lebih besar */
            font-weight: bold;
            color: var(--accent-color);
            text-shadow: 3px 3px 0 var(--primary-color); /* Efek 3D yang lebih jelas */
            line-height: 1.1;
            margin: 0;
        }

        .ecommerce-text {
            text-align: right;
            width: 45%;
        }

        .welcome-text {
            text-align: left;
            width: 45%;
        }

        .to-text {
            font-size: 24px;
            color: var(--primary-color);
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .auth-actions {
            display: flex;
            justify-content: space-around;
            width: 80%;
            max-width: 500px;
            margin-top: 20px;
        }

        .action-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .action-label {
            color: var(--accent-color);
            font-size: 16px;
            font-weight: 600;
        }

        .auth-button {
            background-color: var(--accent-color); /* Cokelat Tua */
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            box-shadow: 0 5px 0 #5C321E; /* Efek tombol 3D yang lebih dalam */
            transition: all 0.1s ease;
        }

        .auth-button:active {
            box-shadow: 0 2px 0 #5C321E;
            transform: translateY(3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar { padding: 10px 20px; flex-direction: column; gap: 10px; }
            .nav-right-section { flex-direction: column; align-items: flex-start; gap: 10px; }
            .search-bar input { width: 150px; }

            .hero-section { flex-direction: column; text-align: center; padding: 30px 20px; }
            .hero-text h1 { font-size: 32px; max-width: 100%; }
            .hero-slider { margin-top: 30px; }

            .product-grid { padding: 20px; }
            .product-list { grid-template-columns: repeat(2, 1fr); }

            .auth-header { flex-direction: column; width: 90%; gap: 15px; }
            .welcome-text, .ecommerce-text { text-align: center; font-size: 28px; width: 100%; }
            .auth-actions { flex-direction: column; gap: 30px; margin-top: 20px; }
            .logo-wrapper { width: 200px; height: 160px; } /* Sesuaikan ukuran crop untuk mobile */
        }
    </style>
</head>
<body>
    <div class="web-container">
        <!-- Struktur Navbar (Hanya Muncul di Halaman Beranda) -->
        <nav class="navbar" id="main-navbar" style="display: none;">
            <div class="nav-links">
                <a onclick="showPage('home')">Beranda</a>
                <a onclick="showPage('home')">Produk</a>
            </div>
            <div class="nav-right-section">
                <div class="nav-icons" style="display: flex; gap: 10px;">
                    <span class="icon icon-cart">🛒</span>
                    <span class="icon icon-chat">💬</span>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Cari produk...">
                    <span class="icon icon-search">🔍</span>
                </div>
                <div class="nav-icons">
                    <!-- Tombol Logout/User akan kembali ke halaman Auth -->
                    <span class="icon icon-user" onclick="showPage('auth')">👤</span>
                </div>
            </div>
        </nav>

        <!-- Container untuk Konten Halaman Dinamis -->
        <main id="content-container">

            <!-- Halaman Utama (Beranda & Product Grid) -->
            <section class="home-page" id="home-page" style="display: none;">
                <div class="hero-section">
                    <div class="hero-text">
                        <h1>JELAJAHI KERAJINAN LOKAL INDONESIA YANG INDAH</h1>
                        <!-- Link ini akan kembali ke halaman auth -->
                        <a onclick="showPage('auth')" class="hero-button">Login/Sign up</a>
                    </div>

                    <div class="hero-slider">
                        <!-- Menggunakan link gambar langsung dari Pinterest/Depositphotos -->
                        <img src="https://i.pinimg.com/736x/1b/53/2d/1b532d280c349bdf202b34d912ff937f.jpg" alt="Keranjang Kecil" class="slider-image">
                        <img src="https://i.pinimg.com/1200x/48/3e/6e/483e6ee19d96076c8a808b3803ee384c.jpg" alt="Keranjang Utama" class="slider-image main">
                        <img src="https://i.pinimg.com/736x/74/7e/6b/747e6baf8cc3dc9ca4fdf775d2fcc3ab.jpg" alt="Tas Anyaman" class="slider-image">
                        <img src="https://i.pinimg.com/1200x/80/3b/c9/803bc987955839da9c878f14ba93cca7.jpg" alt="Lampu meja" class="slider-image">
                    </div>
                </div>

                <div class="product-grid">
                    <h2 class="grid-title">Produk Terlaris Pilihan Kami</h2>
                    <div class="product-list" id="product-list">
                        <!-- Konten produk akan dirender di sini oleh JavaScript -->
                    </div>
                </div>
            </section>

            <!-- Halaman Login/Register (Auth Page) -->
            <section class="auth-page" id="auth-page">

                <!-- BUNGKUS BARU: Untuk cropping watermark -->
                <div class="logo-wrapper">
                    <img src="https://st3.depositphotos.com/8745284/17124/v/1600/depositphotos_171244696-stock-illustration-hand-made-logo.jpg"
                        alt="Handmade Logo"
                        class="logo-handmade">
                </div>

                <div class="auth-header">
                    <span class="welcome-text">WELCOME</span>
                    <span class="ecommerce-text">ECOMMERCE KERAJINAN LOKAL INDONESIA</span>
                </div>

                <p class="to-text">to</p>

                <div class="auth-actions">

                    <div class="action-group">
                        <p class="action-label">masuk sebagai:</p>
                        <button class="auth-button" onclick="alert('Simulasi Login Admin')">admin</button>
                    </div>

                    <div class="action-group">
                        <p class="action-label">Register your account</p>
                        <button class="auth-button" onclick="showPage('home')">Daftar Disini</button>
                        <!-- Setelah daftar, langsung menuju halaman home -->
                    </div>
                </div>
            </section>

        </main>
    </div>

    <script>
        // Data Produk Disimulasikan dari Query SQL Anda
        const dbProducts = [
            { id: 23, name: 'Meja Kayu Minimalis', price: 750000.00, image: 'https://picsum.photos/200?random=1' },
            { id: 24, name: 'Kursi Rotan Unik', price: 350000.00, image: 'https://picsum.photos/200?random=2' },
            { id: 25, name: 'Rak Buku Kayu', price: 500000.00, image: 'https://picsum.photos/200?random=3' },
            { id: 26, name: 'Lemari Pakaian Kayu', price: 1200000.00, image: 'https://picsum.photos/200?random=4' },
            { id: 27, name: 'Tempat Tidur Kayu Jati', price: 2500000.00, image: 'https://picsum.photos/200?random=5' },
            { id: 28, name: 'Meja Belajar', price: 600000.00, image: 'https://picsum.photos/200?random=6' },
            { id: 29, name: 'Bangku Panjang', price: 450000.00, image: 'https://picsum.photos/200?random=7' },
            { id: 30, name: 'Pigura Kayu', price: 100000.00, image: 'https://picsum.photos/200?random=8' },
            { id: 31, name: 'Lampu Hias Kayu', price: 250000.00, image: 'https://picsum.photos/200?random=9' },
            { id: 32, name: 'Kotak Penyimpanan Kayu', price: 150000.00, image: 'https://picsum.photos/200?random=10' },
        ];

        // Fungsi untuk memformat angka menjadi mata uang Rupiah
        const formatRupiah = (angka) => {
            const numStr = String(angka).replace(/\,.*|[^0-9]/g, '');
            const parts = numStr.split('.');
            let rupiah = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return rupiah;
        };

        // Fungsi untuk merender daftar produk
        const renderProducts = () => {
            const productListElement = document.getElementById('product-list');
            if (!productListElement) return;

            let html = '';
            dbProducts.forEach(product => {
                const formattedPrice = formatRupiah(product.price);

                html += `
                    <div class="product-card">
                        <img src="${product.image}" alt="${product.name}" class="product-card-image">
                        <div class="product-info">
                            <h3 class="product-name">${product.name}</h3>
                            <p class="product-price">Rp ${formattedPrice}</p>
                            <button class="buy-button">Lihat Produk</button>
                        </div>
                    </div>
                `;
            });
            productListElement.innerHTML = html;
        };

        // Fungsi untuk mengontrol tampilan halaman (Routing sederhana)
        const showPage = (pageName) => {
            const authPage = document.getElementById('auth-page');
            const homePage = document.getElementById('home-page');
            const navbar = document.getElementById('main-navbar');

            if (pageName === 'auth') {
                authPage.style.display = 'flex'; // Tampilkan halaman Auth
                homePage.style.display = 'none'; // Sembunyikan halaman Home
                navbar.style.display = 'none';   // Sembunyikan Navbar
                document.body.style.backgroundColor = 'var(--secondary-color)';
            } else if (pageName === 'home') {
                authPage.style.display = 'none'; // Sembunyikan halaman Auth
                homePage.style.display = 'block'; // Tampilkan halaman Home
                navbar.style.display = 'flex';   // Tampilkan Navbar
                document.body.style.backgroundColor = '#f4f4f4'; // Ganti background body ke warna default
                renderProducts(); // Pastikan produk dirender saat pindah ke halaman Home
            }
        };

        // Inisialisasi: Render produk saat halaman dimuat dan tampilkan halaman Auth
        window.onload = () => {
            renderProducts();
            // Tampilkan halaman Auth sebagai default saat pertama kali dimuat
            showPage('auth');
        };
    </script>
</body>
</html>
