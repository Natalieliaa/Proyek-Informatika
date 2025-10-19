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
            <a href="#" class="hero-button">Login/Sign up</a>
        </div>
        <div class="hero-slider">
    <img src="https://i.pinimg.com/736x/1b/53/2d/1b532d280c349bdf202b34d912ff937f.jpg" alt="Keranjang Kecil" class="slider-image">
    <img src="https://i.pinimg.com/1200x/48/3e/6e/483e6ee19d96076c8a808b3803ee384c.jpg" alt="Keranjang Utama" class="slider-image main">
    <img src="https://i.pinimg.com/736x/74/7e/6b/747e6baf8cc3dc9ca4fdf775d2fcc3ab.jpg" alt="Tas Anyaman" class="slider-image">
    <img src="https://i.pinimg.com/1200x/80/3b/c9/803bc987955839da9c878f14ba93cca7.jpg" alt="Lampu meja" class="slider-image">
    <button class="slider-control" aria-label="Previous">◀</button>
</div>

<div class="product-grid">
    <div class="product-list">
        @if (!empty($dbProducts) && $dbProducts->count())

            {{-- Loop untuk setiap produk yang diambil dari database --}}
            @foreach ($dbProducts as $product)
                <div class="product-card">

                    {{-- Sumber Gambar menggunakan kolom 'Gambar' --}}
                    <img src="{{ $product->Gambar }}" alt="{{ $product->Nama_Produk }}" class="product-image">

                    <div class="product-info">
                        {{-- Nama Produk menggunakan kolom 'Nama_Produk' --}}
                        <h3 class="product-name">{{ $product->Nama_Produk }}</h3>

                        {{-- Harga Produk menggunakan kolom 'Harga' (difomat ke Rupiah) --}}
                        <p class="product-price">
                            Rp {{ number_format($product->Harga, 0, ',', '.') }}
                        </p>

                        <button class="buy-button">Lihat Produk</button>
                    </div>
                </div>
            @endforeach

        @else
            {{-- Pesan ditampilkan jika tidak ada data --}}
            <p>Maaf, tidak ada produk yang ditemukan saat ini.</p>
        @endif
    </div>
</div>
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
