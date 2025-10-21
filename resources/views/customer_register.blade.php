+@extends('layouts.app')

@section('title', 'Pendaftaran Customer | E-commerce Kerajinan Lokal')

@section('styles')
    <style>
        :root {
            --primary-color: #A9684C;
            --background-color: #F8F4E9;
            --button-dark: #8B4513;
            --button-green: #4CAF50;
            --text-color: #333;
            --border-color: #ddd;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            display: flex;
        }

        /* Sidebar Navigation */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background-color: #F5EFD9;
            padding: 30px 20px;
        }

        .sidebar-title {
            color: #6B3410;
            font-size: 20px;
            font-weight: bold;
            line-height: 1.4;
            margin-bottom: 35px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 10px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar-menu a.active {
            background-color: rgba(169, 104, 76, 0.15);
        }

        .sidebar-menu a:hover {
            background-color: rgba(169, 104, 76, 0.1);
        }

        /* Main Content Area */
        .main-content {
            margin-left: 280px;
            padding: 30px 50px;
            width: calc(100% - 280px);
            min-height: 100vh;
        }

        /* Top Navigation */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
        }

        .nav-left {
            display: flex;
            gap: 40px;
        }

        .nav-left a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .icon-btn {
            background: none;
            border: none;
            font-size: 26px;
            cursor: pointer;
        }

        .search-container {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ddd;
            border-radius: 30px;
            padding: 8px 20px;
            gap: 10px;
        }

        .search-container input {
            border: none;
            outline: none;
            font-size: 14px;
            width: 250px;
        }

        /* Form Section */
        .form-section {
            background: white;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            max-width: 600px;
            margin: 0 auto;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #A9684C;
        }

        .section-title svg {
            width: 35px;
            height: 35px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #333;
        }

        .input-box {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #666;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px 12px 50px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: #A9684C;
        }

        /* File Upload */
        .file-upload {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px 20px;
            border: 2px dashed #ccc;
            border-radius: 8px;
            cursor: pointer;
            background: #fafafa;
            transition: all 0.3s;
        }

        .file-upload:hover {
            border-color: #A9684C;
            background: #fff;
        }

        .file-upload input {
            display: none;
        }

        .file-upload svg {
            width: 24px;
            height: 24px;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
            margin-top: 30px;
        }

        .btn-submit:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .btn-submit svg {
            width: 24px;
            height: 24px;
        }

        /* Error Message */
        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }

        /* Success Message */
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
    </style>
@endsection

@section('content')
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-title">
            ECOMMERCE<br>
            KERAJINAN<br>
            LOKAL<br>
            INDONESIA
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('seller.register') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Pendaftaran Seller
                </a>
            </li>
            <li>
                <a href="{{ route('customer.register') }}" class="active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Pendaftaran Customer
                </a>
            </li>
            <li>
                <a href="{{ route('settings') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M12 1v6m0 6v6m9-9h-6m-6 0H3"></path>
                    </svg>
                    Pengaturan
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <div class="top-nav">
            <div class="nav-left">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('products') }}">Produk</a>
            </div>
            <div class="nav-right">
                <button class="icon-btn" title="Keranjang">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </button>
                <button class="icon-btn" title="Pesan">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </button>
                <div class="search-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" placeholder="Search for a product">
                </div>
                <button class="icon-btn" title="Profil">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Registration Form -->
        <div class="form-section">
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif

            <h2 class="section-title">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Form Pendaftaran Customer
            </h2>

            <form action="{{ route('customer.register.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Nama Lengkap -->
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-box">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input
                            type="text"
                            name="nama_lengkap"
                            class="form-input"
                            value="{{ old('nama_lengkap') }}"
                            required
                            placeholder="Masukkan nama lengkap Anda"
                        >
                    </div>
                    @error('nama_lengkap')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="input-box">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <input
                            type="email"
                            name="email"
                            class="form-input"
                            value="{{ old('email') }}"
                            required
                            placeholder="contoh@email.com"
                        >
                    </div>
                    @error('email')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- User Name -->
                <div class="form-group">
                    <label class="form-label">User Name</label>
                    <div class="input-box">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input
                            type="text"
                            name="username"
                            class="form-input"
                            value="{{ old('username') }}"
                            required
                            placeholder="Pilih username unik Anda"
                        >
                    </div>
                    @error('username')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-box">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input
                            type="password"
                            name="password"
                            class="form-input"
                            required
                            placeholder="Minimal 8 karakter"
                        >
                    </div>
                    @error('password')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div class="form-group">
                    <label class="form-label">Nomor Telepon</label>
                    <div class="input-box">
                        <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <input
                            type="tel"
                            name="nomor_telepon"
                            class="form-input"
                            value="{{ old('nomor_telepon') }}"
                            required
                            placeholder="08xxxxxxxxxx"
                        >
                    </div>
                    @error('nomor_telepon')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Foto Profil -->
                <div class="form-group">
                    <label class="form-label">Foto Profil</label>
                    <label class="file-upload">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="17 8 12 3 7 8"></polyline>
                            <line x1="12" y1="3" x2="12" y2="15"></line>
                        </svg>
                        <span>Choose File</span>
                        <input
                            type="file"
                            name="foto_profil"
                            accept="image/*"
                        >
                    </label>
                    @error('foto_profil')
                        <span class="error-text">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    Daftar Sekarang
                </button>
            </form>
        </div>
    </div>
@endsection
