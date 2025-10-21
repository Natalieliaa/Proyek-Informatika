@extends('layouts.app')

@section('title', 'Data New Seller | Admin Dashboard')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* --- Variabel Warna --- */
        :root {
            --primary-color: #A9684C; /* Cokelat Utama */
            --background-color: #F8F4E9; /* Krem Muda (Latar Belakang Konten) */
            --sidebar-bg: #F5EFD9; /* Krem Lebih Gelap (Latar Belakang Sidebar) */
            --button-dark: #8B4513; /* Cokelat Tua */
            --button-green: #4CAF50; /* Hijau Setujui */
            --button-red: #f44336; /* Merah Tolak */
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
            min-height: 100vh;
        }

        /* --- Sidebar Navigation (Diambil dari layouts.app, diulang di sini untuk konteks) --- */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background-color: var(--sidebar-bg);
            padding: 30px 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
            z-index: 10;
        }

        .sidebar-title {
            color: #6B3410;
            font-size: 20px;
            font-weight: bold;
            line-height: 1.4;
            margin-bottom: 35px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--primary-color);
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
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
            font-weight: bold;
        }

        .sidebar-menu a:hover {
            background-color: rgba(169, 104, 76, 0.1);
        }
        .sidebar-menu .fa-angle-right { color: var(--button-red); }

        /* --- Main Content Area --- */
        .main-content {
            margin-left: 280px;
            padding: 30px 50px;
            width: calc(100% - 280px);
            min-height: 100vh;
        }

        /* --- Top Navigation --- */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 50px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .nav-left {
            display: flex;
            gap: 40px;
        }

        .nav-left a {
            color: #333;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
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
            color: var(--button-dark);
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

        /* --- Layout Halaman Data Seller --- */
        .data-page-layout {
            display: grid;
            grid-template-columns: 1fr 1.5fr; /* Daftar lebih kecil, Detail lebih besar */
            gap: 40px;
        }

        .page-title {
            color: var(--button-dark);
            font-size: 28px;
            margin-bottom: 30px;
        }

        /* --- Tabel Daftar Seller --- */
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            overflow: hidden;
            border: 1px solid #eee;
        }

        .table-header, .table-row {
            display: grid;
            grid-template-columns: 2fr 3fr 1.5fr 1.5fr; /* Nama, Email, Tanggal, Status */
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .table-header {
            background-color: var(--sidebar-bg);
            font-weight: bold;
            color: var(--text-color);
        }

        .table-row:last-child {
            border-bottom: none;
        }
        .table-row:hover {
            background-color: #fafafa;
        }
        .table-row.selected {
            background-color: rgba(169, 104, 76, 0.1);
            font-weight: bold;
        }

        .status-badge {
            padding: 4px 8px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }
        .status-Pending { background-color: #ffcc80; color: #e65100; }
        .status-Approved { background-color: #c8e6c9; color: #388e3c; }
        .status-Rejected { background-color: #ffcdd2; color: #d32f2f; }

        /* --- Detail Seller --- */
        .detail-title {
            color: var(--button-dark);
            font-size: 24px;
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .detail-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .seller-name {
            color: var(--primary-color);
            font-size: 28px;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .detail-item {
            margin-bottom: 10px;
            font-size: 16px;
            line-height: 1.5;
        }

        .detail-label {
            font-weight: bold;
            color: var(--button-dark);
            width: 150px;
            display: inline-block;
        }

        .button-group {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .btn-approve, .btn-reject {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-approve {
            background-color: var(--button-green);
            box-shadow: 0 4px 0 #388e3c;
        }
        .btn-reject {
            background-color: var(--button-red);
            box-shadow: 0 4px 0 #d32f2f;
        }
        .btn-approve:active, .btn-reject:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0;
        }

        .email-info {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #666;
            margin-left: auto;
        }
        .email-info i {
            font-size: 20px;
            color: var(--primary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .data-page-layout {
                grid-template-columns: 1fr;
            }
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }
            .main-content {
                margin-left: 0;
                padding: 20px;
                width: 100%;
            }
            .top-nav {
                flex-direction: column;
                gap: 15px;
            }
            .table-header, .table-row {
                grid-template-columns: 2fr 1fr 1fr 1fr;
            }
            .detail-label {
                width: 100px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Sidebar (Dianggap ada di layouts.app, tapi diulang di sini untuk pratinjau) -->
    <aside class="sidebar">
        <div class="sidebar-title">
            ECOMMERCE<br>KERAJINAN<br>LOKAL<br>INDONESIA
        </div>
        <ul class="sidebar-menu">
            <li><a href="#"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li><a href="#" class="active"><i class="fas fa-clipboard-list"></i> <span>Data new Seller</span></a></li>
            <li><a href="#"><i class="fas fa-user-plus"></i> <span>Daftar Seller</span></a></li>
            <li><a href="#"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
            <li style="margin-left: 30px;"><a href="#" style="color: #f44336;"><i class="fas fa-angle-right"></i> <span>Delete Account</span></a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Navigation -->
        <nav class="top-nav">
            <div class="nav-left">
                <a href="#">Beranda</a>
                <a href="#">Produk</a>
            </div>
            <div class="nav-right">
                <button class="icon-btn" title="Keranjang"><i class="fas fa-shopping-cart"></i></button>
                <button class="icon-btn" title="Chat"><i class="fas fa-comment"></i></button>
                <div class="search-container">
                    <input type="text" placeholder="Search for a product">
                    <i class="fas fa-search"></i>
                </div>
                <button class="icon-btn" title="Profil Pengguna"><i class="fas fa-user-circle"></i></button>
            </div>
        </nav>

        <!-- Layout Utama Halaman Data Seller -->
        <div class="data-page-layout">

            <!-- Kolom Kiri: Daftar Seller -->
            <div class="seller-list-column">
                <h1 class="page-title">Pendaftaran Seller Baru</h1>

                <div class="table-container">
                    <div class="table-header">
                        <div>Nama</div>
                        <div>Email</div>
                        <div>Tanggal</div>
                        <div>Status</div>
                    </div>

                    <!-- Rows akan diisi oleh JavaScript -->
                    <div id="seller-table-body">
                        <!-- Data Seller Disimulasikan -->
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Detail Seller -->
            <div class="seller-detail-column">
                <div id="detail-section">
                    <h2 class="detail-title">Detail New Seller</h2>
                    <div class="detail-card">
                        <p style="text-align: center; color: #999; padding: 50px;">
                            Pilih salah satu seller dari daftar di samping untuk melihat detail pendaftaran.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        // Simulasi data yang biasanya didapatkan dari Controller Laravel
        const sellersData = [
            { id: 1, name: 'Adi Wibowo', email: 'adi.wibowo@mail.com', shop_name: 'Kerajinan Jati', category: 'kerajinan-kayu', city: 'Jepara', province: 'Jawa Tengah', created_at: '2024-09-10', status: 'Pending' },
            { id: 2, name: 'Siti Dewi', email: 'siti.dewi@mail.com', shop_name: 'Batik Nusantara', category: 'batik', city: 'Solo', province: 'Jawa Tengah', created_at: '2024-09-08', status: 'Approved' },
            { id: 3, name: 'Joko Susilo', email: 'joko.susi@mail.com', shop_name: 'Anyaman Bambu', category: 'anyaman', city: 'Bantul', province: 'DI Yogyakarta', created_at: '2024-09-05', status: 'Pending' },
            { id: 4, name: 'Rina Wijaya', email: 'rina.wija@mail.com', shop_name: 'Keramik Indah', category: 'keramik', city: 'Bandung', province: 'Jawa Barat', created_at: '2024-09-01', status: 'Rejected' },
        ];

        let selectedSellerId = 1; // Default menampilkan seller pertama (Adi Wibowo)

        // Fungsi untuk memformat tanggal
        const formatDate = (dateString) => {
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        };

        // Fungsi untuk merender status badge
        const renderStatusBadge = (status) => {
            return `<span class="status-badge status-${status}">${status.toUpperCase()}</span>`;
        };

        // Fungsi untuk merender daftar seller di tabel
        const renderSellerList = () => {
            const tableBody = document.getElementById('seller-table-body');
            if (!tableBody) return;

            tableBody.innerHTML = sellersData.map(seller => {
                const isSelected = seller.id === selectedSellerId ? 'selected' : '';
                return `
                    <div class="table-row ${isSelected}" onclick="selectSeller(${seller.id})">
                        <div>${seller.name}</div>
                        <div>${seller.email}</div>
                        <div>${new Date(seller.created_at).toLocaleDateString('id-ID')}</div>
                        <div>${renderStatusBadge(seller.status)}</div>
                    </div>
                `;
            }).join('');
        };

        // Fungsi untuk merender detail seller yang dipilih
        const renderSellerDetail = () => {
            const detailSection = document.getElementById('detail-section');
            const selectedSeller = sellersData.find(s => s.id === selectedSellerId);

            if (!detailSection || !selectedSeller) {
                detailSection.innerHTML = `
                    <h2 class="detail-title">Detail New Seller</h2>
                    <div class="detail-card"><p style="text-align: center; color: #999; padding: 50px;">Pilih salah satu seller dari daftar di samping untuk melihat detail pendaftaran.</p></div>
                `;
                return;
            }

            const formattedCategory = selectedSeller.category.split('-').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
            const statusStyle = selectedSeller.status === 'Pending' ? '#ff9800' : (selectedSeller.status === 'Approved' ? '#4CAF50' : '#f44336');
            const statusText = selectedSeller.status;

            let buttonHtml;

            if (selectedSeller.status === 'Pending') {
                buttonHtml = `
                    <button class="btn-approve" onclick="updateSellerStatus(${selectedSeller.id}, 'Approved')">Setujui</button>
                    <button class="btn-reject" onclick="updateSellerStatus(${selectedSeller.id}, 'Rejected')">Tolak</button>
                `;
            } else if (selectedSeller.status === 'Approved') {
                 buttonHtml = `
                    <div style="padding: 12px 25px; background: #4CAF50; color: white; border-radius: 8px; font-weight: bold; box-shadow: 0 4px 0 #388e3c;">
                        <i class="fas fa-check-circle"></i> Seller Sudah Disetujui
                    </div>
                 `;
            } else {
                 buttonHtml = `
                    <div style="padding: 12px 25px; background: #f44336; color: white; border-radius: 8px; font-weight: bold; box-shadow: 0 4px 0 #d32f2f;">
                        <i class="fas fa-times-circle"></i> Seller Ditolak
                    </div>
                 `;
            }

            detailSection.innerHTML = `
                <h2 class="detail-title">Detail New Seller</h2>
                <div class="detail-card">
                    <h3 class="seller-name">${selectedSeller.name}</h3>

                    <div class="detail-item"><span class="detail-label">Nama :</span> ${selectedSeller.name}</div>
                    <div class="detail-item"><span class="detail-label">Email :</span> ${selectedSeller.email}</div>
                    <div class="detail-item"><span class="detail-label">Nama Toko :</span> ${selectedSeller.shop_name}</div>
                    <div class="detail-item"><span class="detail-label">Kategori :</span> ${formattedCategory}</div>
                    <div class="detail-item"><span class="detail-label">Lokasi :</span> ${selectedSeller.city}, ${selectedSeller.province}</div>
                    <div class="detail-item"><span class="detail-label">Tanggal Daftar :</span> ${formatDate(selectedSeller.created_at)}</div>

                    <div class="detail-item">
                        <span class="detail-label">Status :</span>
                        <span style="color: ${statusStyle}; font-weight: bold;">${statusText}</span>
                    </div>

                    <div class="button-group">
                        ${buttonHtml}
                        <div class="email-info">
                            <i class="fas fa-envelope"></i>
                            <span>Email konfirmasi<br>telah dikirim kepada Seller</span>
                        </div>
                    </div>
                </div>
            `;
        };

        // Fungsi untuk mengubah seller yang dipilih
        const selectSeller = (id) => {
            selectedSellerId = id;
            renderSellerList();
            renderSellerDetail();
        };

        // Fungsi untuk simulasi update status (approve/reject)
        const updateSellerStatus = (id, newStatus) => {
            const sellerIndex = sellersData.findIndex(s => s.id === id);
            if (sellerIndex !== -1) {
                // Simulasikan POST request sukses di Laravel
                sellersData[sellerIndex].status = newStatus;

                // Panggil ulang rendering untuk update UI
                renderSellerList();
                renderSellerDetail();

                // Simulasi pesan sukses (tanpa alert)
                console.log(`Seller ${sellersData[sellerIndex].name} berhasil diubah status menjadi ${newStatus}.`);
            }
        };

        // Inisialisasi tampilan saat halaman dimuat
        window.onload = () => {
            renderSellerList();
            renderSellerDetail();
        };
    </script>
@endsection
