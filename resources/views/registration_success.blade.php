@extends('layouts.sidebar_app')

@section('title', 'Pendaftaran Berhasil')

@section('styles')
    <style>
        .success-container {
            text-align: center;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
        }

        .success-icon {
            font-size: 60px;
            color: #4CAF50; /* Green */
            margin-bottom: 10px;
        }

        .success-header h2 {
            font-size: 30px;
            color: var(--text-dark);
            margin: 0;
        }

        .success-header p {
            color: #555;
            margin-bottom: 40px;
        }

        /* --- Detail Customer Card (Sama seperti Admin Detail) --- */
        .detail-customer-section {
            text-align: left;
            margin-bottom: 40px;
        }

        .section-title-small {
            font-size: 20px;
            font-weight: 600;
            color: #555;
            margin-bottom: 15px;
        }

        .customer-table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--secondary-color);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .customer-table thead tr {
            background-color: var(--primary-color);
            color: white;
            text-align: left;
        }

        .customer-table th, .customer-table td {
            padding: 12px 15px;
            font-size: 14px;
        }

        .customer-table td {
            border-bottom: 1px solid #e0e0e0;
            color: var(--text-dark);
        }

        .customer-table td a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .status-aktif {
            background-color: #4CAF50;
            color: white;
            padding: 4px 8px;
            border-radius: 5px;
            font-weight: bold;
        }

        /* --- Komunitas Section --- */
        .community-card {
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #eee;
            margin-bottom: 30px;
        }

        .community-card h3 {
            color: #4682B4; /* SteelBlue */
            font-size: 18px;
            margin-top: 0;
        }

        .community-card ul {
            list-style: none;
            padding: 0;
            margin-top: 15px;
        }

        .community-card li {
            font-size: 16px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .community-card li i {
            color: #4CAF50;
            margin-right: 10px;
            font-size: 20px;
        }

        /* --- Action Buttons --- */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            align-items: center;
        }

        .btn-start-shopping {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.2s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .btn-start-shopping:hover {
            background-color: #8B4513;
        }

        .btn-complete-profile {
            background-color: white;
            color: var(--text-dark);
            padding: 12px 30px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .email-note {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #555;
            margin-left: 20px;
            text-align: left;
        }
    </style>
@endsection

@section('content')
    <!-- Simulasikan data customer yang baru mendaftar -->
    @php
        $customer = (object)[
            'name' => 'Zeela Maharani',
            'email' => 'zeelaa@gmail.com',
            'date' => '25 Mei 2025',
            'status' => 'Aktif'
        ];
    @endphp

    <div class="success-container">

        <div class="success-header">
            <span class="success-icon">✅</span>
            <h2>SELAMAT DATANG!</h2>
            <p>Akun Anda telah berhasil dibuat. Mulai belanja kerajinan lokal Indonesia terbaik</p>
        </div>

        <!-- Detail Customer -->
        <div class="detail-customer-section">
            <h3 class="section-title-small">Detail Customer</h3>
            <table class="customer-table">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Tanggal Daftar</th>
                        <th>Status Akun</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                        <td>{{ $customer->date }}</td>
                        <td><span class="status-aktif">{{ $customer->status }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Komunitas Section -->
        <div class="community-card">
            <h3>Selamat Bergabung dengan Komunitas Kerajinan Lokal!</h3>
            <p style="color: #666;">Terima kasih telah mendaftar di platform e-commerce kerajinan lokal Indonesia. Kini Anda dapat menikmati berbagai keuntungan sebagai member kami:</p>
            <ul>
                <li><i aria-hidden="true">✔</i> Akses ke ribuan produk kerajinan lokal</li>
                <li><i aria-hidden="true">✔</i> Dukungan untuk pengrajin lokal Indonesia</li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('home') ?? '#' }}" class="btn-start-shopping">Mulai Belanja</a>
            <a href="{{ route('profile.edit') ?? '#' }}" class="btn-complete-profile">Lengkapi Profil</a>

            <div class="email-note">
                <span style="font-size: 16px; margin-right: 5px;">✉️</span> Email konfirmasi <br>silahkan cek email Anda<br> untuk Verifikasi akun.
            </div>
        </div>

    </div>
@endsection
