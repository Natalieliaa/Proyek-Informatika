@extends('layouts.app')

@section('title', 'Welcome | E-commerce Kerajinan Lokal')

@section('styles')
    <style>
        :root {
            --primary-color: #A9684C; /* Cokelat utama */
            --background-color: #F8F4E9; /* Warna krem dari gambar */
            --button-dark: #8B4513; /* Cokelat gelap untuk tombol */
            --text-shadow-color: #e0d9c9; /* Warna bayangan teks */
        }

        /* --- Gaya Global (Diambil dari Layouts) --- */
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

        .landing-container {
            text-align: center;
            padding: 40px;
            max-width: 800px;
            width: 100%;
        }

        .main-logo {
            width: 300px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(2px 2px 2px rgba(0, 0, 0, 0.2));
        }

        h1 {
            font-size: 50px;
            color: var(--button-dark);
            text-shadow: 4px 4px var(--text-shadow-color);
            margin: 0;
            line-height: 1.1;
        }

        .header-split {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .header-split .left, .header-split .right {
            flex: 1;
            padding-top: 20px;
        }

        .center-text {
            font-size: 30px;
            color: var(--button-dark);
            text-shadow: 2px 2px var(--text-shadow-color);
            margin: -20px 0 30px 0;
        }

        .button-section {
            display: flex;
            justify-content: space-between;
            gap: 50px;
            max-width: 550px;
            margin: 0 auto;
            margin-top: 30px;
        }

        .custom-button {
            background-color: var(--button-dark);
            color: white;
            padding: 10px 30px;
            border: 2px solid var(--button-dark);
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .custom-button:hover {
            background-color: #a0522d;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.4);
        }

        .small-text-left, .small-text-right {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        .small-text-left { text-align: right; }
        .small-text-right { text-align: left; }

        /* --- Gaya Modal (BARU) --- */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Blur background */
            display: none; /* Sembunyikan secara default */
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 350px;
        }

        .modal-content h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .modal-button {
            background-color: var(--button-dark);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            display: block;
            width: 100%;
            margin-bottom: 15px;
            transition: background-color 0.2s;
        }

        .modal-button:hover {
            background-color: var(--primary-color);
        }
    </style>
@endsection

@section('content')
    <div class="landing-container">

        <div class="header-split">
            <div class="left">
                <h1>WELCOME</h1>
            </div>

            <div class="center-logo">
                <img src="https://st3.depositphotos.com/8745284/17124/v/1600/depositphotos_171244696-stock-illustration-hand-made-logo.jpg" alt="Handmade Logo" class="main-logo">
            </div>

            <div class="right">
                <h1 style="font-size: 30px;">ECOMMERCE KERAJINAN LOKAL INDONESIA</h1>
            </div>
        </div>

        <div class="center-text">to</div>

        <div class="button-section">
            <div class="button-group">
                <p class="small-text-left">masuk sebagai:</p>
                <!-- Tombol Admin -->
                <a href="{{ route('auth.login') ?? '#' }}" class="custom-button">admin</a>
            </div>

            <div class="button-group" style="text-align: left;">
                <p class="small-text-right">Register your account</p>
                <!-- Tombol DAFTAR DISINI - Memanggil fungsi JavaScript untuk menampilkan modal -->
                <button type="button" class="custom-button" onclick="showRegisterModal()">Daftar Disini</button>
            </div>
        </div>

    </div>

    <!-- MODAL PILIH JENIS AKUN -->
    <div id="registerModal" class="modal-overlay">
        <div class="modal-content">
            <h3>pilih jenis akun</h3>
            <!-- Asumsi route pendaftaran customer -->
            <a href="#" class="modal-button">Daftar Sebagai Customer</a>
            <!-- Asumsi route pendaftaran seller -->
            <a href="#" class="modal-button">Daftar Sebagai Seller</a>

            <!-- Tombol penutup modal (opsional, bisa juga ditutup dengan klik overlay) -->
            <button class="modal-button" style="background-color: #ccc; margin-top: 10px;" onclick="closeRegisterModal()">Tutup</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Fungsi untuk menampilkan Modal
        function showRegisterModal() {
            const modal = document.getElementById('registerModal');
            modal.style.display = 'flex';
            // Tambahkan event listener untuk menutup modal saat klik di luar area modal
            modal.onclick = function(event) {
                if (event.target === modal) {
                    closeRegisterModal();
                }
            };
        }

        // Fungsi untuk menyembunyikan Modal
        function closeRegisterModal() {
            const modal = document.getElementById('registerModal');
            modal.style.display = 'none';
        }
    </script>
@endsection
