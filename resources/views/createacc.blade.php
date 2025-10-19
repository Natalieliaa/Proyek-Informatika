@extends('layouts.app')

@section('title', 'Welcome | E-commerce Kerajinan Lokal')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="landing-container">

        <div class="header-split">
            <div class="left">
                <h1>WELCOME</h1>
            </div>

            <div class="center-logo">
                <!-- Placeholder untuk logo 'Handmade' -->
                <img src="https://placehold.co/300x150/F8F4E9/333?text=Hand+made" alt="Handmade Logo" class="main-logo">
            </div>

            <div class="right">
                <h1 style="font-size: 30px;">ECOMMERCE KERAJINAN LOKAL INDONESIA</h1>
            </div>
        </div>

        <div class="center-text">to</div>

        <div class="button-section">
            <div class="button-group">
                <p class="small-text-left">masuk sebagai:</p>
                <!-- Asumsi route 'admin.login' ada -->
                <a class="custom-button">admin</a>
            </div>

            <div class="button-group" style="text-align: left;">
                <p class="small-text-right">Register your account</p>
                <!-- Asumsi route 'register' ada -->
                <a class="custom-button">Daftar Disini</a>
            </div>
        </div>

    </div>
@endsection
