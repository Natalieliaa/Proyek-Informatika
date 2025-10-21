@extends('layouts.app')

@section('title', 'Login E-commerce')

@section('styles')
    <style>
        /* Menggunakan warna background dari root app layout */
        body {
            background-color: var(--secondary-color, #F8F4E9);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-page-container {
            display: flex;
            align-items: center;
            justify-content: space-around;
            width: 80%;
            max-width: 900px;
            padding: 50px 0;
        }

        .login-card {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 350px;
            flex-shrink: 0;
        }

        .login-card h1 {
            font-size: 24px;
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 30px;
        }

        /* Tombol Google */
        .google-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            transition: background-color 0.2s;
        }

        .google-button:hover {
            background-color: #f7f7f7;
        }

        .google-button span {
            font-size: 20px;
            margin-right: 10px;
            /* Simulasi ikon Google G */
            color: #DB4437;
        }

        /* Divider OR */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
            color: #999;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ccc;
        }

        .divider:not(:empty)::before {
            margin-right: .5em;
        }

        .divider:not(:empty)::after {
            margin-left: .5em;
        }

        /* Form Input */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.2s;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
        }

        /* Remember Me & Forgot Password */
        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-bottom: 30px;
        }

        .options a {
            color: #555;
            text-decoration: none;
        }

        /* Tombol Login */
        .login-button {
            background-color: var(--primary-color, #A9684C);
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .login-button:hover {
            background-color: #8B4513; /* Cokelat yang lebih gelap */
        }

        /* Kolom Kanan: Branding */
        .branding-text h2 {
            font-size: 40px;
            color: var(--primary-color);
            line-height: 1.1;
            max-width: 300px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: right;
        }

        @media (max-width: 800px) {
            .login-page-container {
                flex-direction: column;
                padding: 30px;
            }
            .branding-text {
                display: none; /* Sembunyikan branding di mobile/tablet kecil */
            }
        }
    </style>
@endsection

@section('content')
    <div class="login-page-container">

        <!-- Kolom Kiri: Form Login -->
        <div class="login-card">
            <h1>Login</h1>

            <form method="POST" action="#">
                {{-- @csrf --}} <!-- Directive CSRF Laravel -->

                <!-- Sign in with Google -->
                <button type="button" class="google-button">
                    <span style="font-size: 24px;">G</span> sign in with google
                </button>

                <div class="divider">or</div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required autofocus>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="options">
                    <label>
                        <input type="checkbox" name="remember">
                        Remember Me
                    </label>
                    <a href="#">Forget password</a>
                </div>

                <!-- Tombol Login -->
                <button type="submit" class="login-button">Login</button>
            </form>
        </div>

        <!-- Kolom Kanan: Branding E-commerce -->
        <div class="branding-text">
            <h2>ECOMMERCE KERAJINAN LOKAL INDONESIA</h2>
        </div>
    </div>
@endsection
