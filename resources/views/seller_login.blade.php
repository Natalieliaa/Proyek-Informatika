@extends('layouts.sidebar_app')

@section('title', 'Login Seller')

@section('styles')
    <style>
        .login-card {
            max-width: 450px;
            padding: 40px;
            margin: 40px auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .login-card h2 {
            font-size: 32px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 30px;
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-field {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            background-color: #f8f8f8;
            transition: border-color 0.2s;
        }

        .input-field:focus {
            border-color: var(--primary-color);
            outline: none;
            background-color: white;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            margin-top: 30px;
            background-color: #7EC94F; /* Warna Hijau seperti di gambar */
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-login:hover {
            background-color: #69b343;
        }
    </style>
@endsection

@section('content')
    <div class="login-card">
        <h2>Login Seller</h2>

        <form action="{{ route('seller.login.submit') ?? '#' }}" method="POST">
            <!-- CSRF token untuk keamanan Laravel -->
            <input type="hidden" name="_token" value="{{ csrf_token() ?? 'SIMULATED_CSRF_TOKEN' }}">

            <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="input-field" required>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="input-field" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
@endsection
