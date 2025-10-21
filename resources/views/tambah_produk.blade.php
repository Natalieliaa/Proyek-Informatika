@extends('layouts.app')

@section('title', 'Tambah Produk | E-commerce Kerajinan Lokal')

@section('styles')
<style>
  :root{
    --primary:#A9684C; --bg:#F8F4E9; --text:#333; --brown:#8B4513; --panel:#EED4B4;
  }
  *{box-sizing:border-box} body{margin:0;background:var(--bg);font-family:Arial,sans-serif;display:flex}

  /* Layout dasar */
  .page{display:grid;grid-template-columns:280px 1fr;gap:0;width:100%}
  .main{padding:28px 38px}

  /* Sidebar */
  .sidebar{height:100vh;background:#F5EFD9;border-right:2px solid var(--primary);padding:28px 20px;position:sticky;top:0}
  .brand{color:#6B3410;font-weight:800;line-height:1.25;font-size:24px;margin-bottom:26px}
  .menu{list-style:none;padding:0;margin:0}
  .menu li{margin:12px 0}
  .menu a{display:flex;align-items:center;gap:10px;text-decoration:none;color:#2c2c2c;padding:10px 12px;border-radius:8px}
  .menu a.active,.menu a:hover{background:rgba(169,104,76,.15)}

  /* Grid konten */
  .content{display:grid;grid-template-columns:1.15fr 8px 0.85fr;gap:28px;align-items:start}
  .divider{width:2px;background:#111;border-radius:1px;opacity:.9;justify-self:center;height:100%}

  /* Katalog kiri */
  .catalog{display:grid;grid-template-columns:repeat(2,minmax(230px,1fr));gap:28px 36px}
  .p-card{display:flex;flex-direction:column;gap:10px}
  .p-img{width:230px;height:190px;object-fit:cover;border-radius:14px;box-shadow:0 2px 10px rgba(0,0,0,.08)}
  .p-title{font-weight:700;margin-top:6px}
  .p-meta{color:#333}
  .btn-detail{background:var(--brown);color:#fff;border:none;padding:11px 18px;border-radius:12px;font-weight:800;cursor:pointer;width:max-content}

  /* Panel kanan */
  .panel{display:flex;flex-direction:column;gap:16px}
  .panel h1{font-size:32px;margin:0;font-weight:900}
  .panel p{margin:0 0 6px 0;color:#444}
  .card{background:#F0D8B8;border-radius:12px;padding:22px;border:1px solid rgba(0,0,0,.08)}
  .card-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
  .card-head strong{font-size:18px}
  .x{font-weight:700;opacity:.6}

  .f-group{margin:14px 0}
  .label{display:block;margin-bottom:8px;font-weight:700}
  .input,.textarea{width:100%;border:2px solid #ccc;border-radius:12px;background:#fff;padding:12px 14px;font-size:14px}
  .textarea{min-height:120px;resize:vertical}
  .submit{display:flex;justify-content:center}
  .btn-save{background:#8B4513;color:#fff;border:none;border-radius:12px;font-weight:800;padding:13px 22px;cursor:pointer}

  /* Top breadcrumb kecil */
  .crumb{color:#a0a0a0;font-weight:600;margin:8px 0 16px 0}
</style>
@endsection

@section('content')
<div class="page">
  {{-- SIDEBAR --}}
  <aside class="sidebar">
    <div class="brand">ECOMMERCE<br>KERAJINAN<br>LOKAL<br>INDONESIA</div>
    <ul class="menu">
      <li><a href="#" class="active">🏠 Dashboard</a></li>
      <li><a href="#">👤 Pendaftaran Seller</a></li>
      <li><a href="#">🧾 Pendaftaran Customer</a></li>
      <li><a href="#">⚙ Pengaturan</a></li>
      <li style="margin-left:14px;"><a href="#">› Delete Account</a></li>
      <li style="margin-left:14px;"><a href="#">› Edit Detail Akun</a></li>
      <li><a href="#" class="active">➕ Tambah Produk</a></li>
      <li><a href="#">🗑 Menghapus produk</a></li>
      <li><a href="#">📊 Laporan Pendapatan</a></li>
    </ul>
  </aside>

  {{-- MAIN --}}
  <main class="main">
    <div class="crumb">Tambah Produk</div>

    <div class="content">
      {{-- Kiri: Katalog contoh --}}
      <section class="catalog">
        <div class="p-card">
          <img class="p-img" src="{{ asset('images/sample/tas-rotan.jpg') }}"
               onerror="this.src='https://images.unsplash.com/photo-1519710164239-da123dc03ef4?w=600&q=60'" alt="">
          <div class="p-title">Tas Rotan</div>
          <div class="p-meta">Rp 50.000 <span>⭐</span> 4.8</div>
          <button class="btn-detail">Lihat Detail</button>
        </div>

        <div class="p-card">
          <img class="p-img" src="{{ asset('images/sample/rak-buku.jpg') }}"
               onerror="this.src='https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=60'" alt="">
          <div class="p-title">Rak Buku</div>
          <div class="p-meta">Rp 250.000 <span>⭐</span> 4.7</div>
          <button class="btn-detail">Lihat Detail</button>
        </div>

        <div class="p-card">
          <img class="p-img" src="{{ asset('images/sample/tas-kayu.jpg') }}"
               onerror="this.src='https://images.unsplash.com/photo-1518791841217-8f162f1e1131?w=600&q=60'" alt="">
          <div class="p-title">Tas Kayu</div>
          <div class="p-meta">Rp 150.000 <span>⭐</span> 4.7</div>
          <button class="btn-detail">Lihat Detail</button>
        </div>

        <div class="p-card">
          <img class="p-img" src="{{ asset('images/sample/kotak-tisu.jpg') }}"
               onerror="this.src='https://images.unsplash.com/photo-1503602642458-232111445657?w=600&q=60'" alt="">
          <div class="p-title">Kotak Tisu</div>
          <div class="p-meta">Rp 25.000 <span>⭐</span> 4.8</div>
          <button class="btn-detail">Lihat Detail</button>
        </div>
      </section>

      {{-- Garis Pemisah --}}
      <div class="divider"></div>

      {{-- Kanan: Form --}}
      <aside class="panel">
        <h1>+ Tambah Produk</h1>
        <p>Temukan Kerajinan tangan berkualitas dari pengrajin lokal</p>

        <div class="card">
          <div class="card-head">
            <strong>Tambah Produk Baru</strong>
            <span class="x">X</span>
          </div>

          <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="f-group">
              <label class="label">Nama Produk</label>
              <input class="input" type="text" placeholder="Contoh: Tas Rotan">
            </div>

            <div class="f-group">
              <label class="label">Jumlah Produk</label>
              <input class="input" type="number" min="0" placeholder="0">
            </div>

            <div class="f-group">
              <label class="label">Deskripsi</label>
              <textarea class="textarea" placeholder="Tulis deskripsi singkat..."></textarea>
            </div>

            <div class="f-group">
              <label class="label">Harga (Rp)</label>
              <input class="input" type="number" min="0" placeholder="250000">
            </div>

            <div class="f-group">
              <label class="label">Foto Produk</label>
              <input class="input" type="file" accept="image/*">
            </div>

            <div class="submit">
              <button type="submit" class="btn-save">Simpan Produk</button>
            </div>
          </form>
        </div>
      </aside>
    </div>
  </main>
</div>
@endsection
