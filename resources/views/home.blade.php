@extends('layouts.app')

@section('title', 'E-commerce Kerajinan Lokal Indonesia - Beranda')

@section('styles')
    <style>
        /* CSS Khusus Halaman Beranda */
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
            font-size: 48px;
            line-height: 1.1;
            max-width: 500px;
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
        }

        .hero-slider {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .slider-image {
            width: 150px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .slider-image.main {
            width: 250px;
            height: 300px;
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

        /* --- Product Grid Styles --- */
        .product-grid {
            padding: 30px;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .product-card {
            text-align: center;
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

        .product-card .price {
            font-weight: bold;
            color: var(--text-dark);
        }

        .separator {
            border-bottom: 1px solid #ccc;
            margin-top: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="hero-section">
        <div class="hero-text">
            <h1>ECOMMERCE KERAJINAN LOKAL INDONESIA</h1>
            <a href="{{ route('auth.page') ?? '#' }}" class="hero-button">Login/Sign up</a>
        </div>
        <div class="hero-slider">
            <img src="https://via.placeholder.com/150x200/F5DEB3/8B4513?text=Anyaman" alt="Keranjang Kecil" class="slider-image">
            <img src="https://via.placeholder.com/250x300/B8860B/FFFFFF?text=Keranjang+Besar" alt="Keranjang Utama" class="slider-image main">
            <button class="slider-control" aria-label="Previous"></button>
        </div>
    </div>

    <div class="product-grid">
        <div class="product-list">
            @php
                // Data produk (simulasi)
                $products = [
                    ['name' => 'Storage Basket', 'price' => 'Rp 120.000', 'image' => 'https://via.placeholder.com/180/EEDD82/333?text=Basket'],
                    ['name' => 'Craft Lamp', 'price' => 'Rp 100.000', 'image' => 'https://via.placeholder.com/180/CD853F/333?text=Lamp'],
                    ['name' => 'Vas Rotan', 'price' => 'Rp 100.000', 'image' => 'https://via.placeholder.com/180/F4A460/333?text=Vase'],
                    ['name' => 'Container Storage', 'price' => 'Rp 60.000', 'image' => 'https://via.placeholder.com/180/D2B48C/333?text=Storage'],
                    ['name' => 'Tas Rotan', 'price' => 'Rp 50.000', 'image' => 'https://via.placeholder.com/180/8B4513/FFF?text=Bag'],
                ];
            @endphp

            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-card-image">
                    <p>{{ $product['name'] }}</p>
                    <p class="price">{{ $product['price'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="separator"></div>
    </div>
@endsection
