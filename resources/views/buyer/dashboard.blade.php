@extends('layouts.buyer')

@section('content')

<div class="p-4 rounded-4 mb-5 text-white"
style="background:linear-gradient(135deg,#2563eb,#3b82f6);">

<div class="row align-items-center">

<div class="col-lg-8">

<h2 class="fw-bold mb-3">

Halo, {{ auth()->user()->name }} 👋

</h2>

<p class="mb-4 opacity-75">

Selamat datang kembali di Marketplace.
Temukan berbagai produk terbaik dan nikmati pengalaman belanja yang mudah serta aman.

</p>

<a
href="{{ route('buyer.marketplace') }}"
class="btn btn-light rounded-pill px-4 py-2">

Mulai Belanja

</a>

</div>

<div class="col-lg-4 text-end">

<i class="bi bi-bag-heart-fill"
style="font-size:120px;opacity:.15;"></i>

</div>

</div>

</div>

<div class="row g-4">

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<p class="text-secondary mb-1">

Total Produk

</p>

<h2 class="fw-bold">

{{ $totalProduk }}

</h2>

</div>

<div
class="rounded-circle d-flex justify-content-center align-items-center"
style="width:65px;height:65px;background:#eff6ff;">

<i class="bi bi-box-seam fs-2 text-primary"></i>

</div>

</div>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<p class="text-secondary mb-1">

Keranjang

</p>

<h2 class="fw-bold">

{{ $totalKeranjang }}

</h2>

</div>

<div
class="rounded-circle d-flex justify-content-center align-items-center"
style="width:65px;height:65px;background:#eff6ff;">

<i class="bi bi-cart3 fs-2 text-primary"></i>

</div>

</div>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4">

<div class="card-body">

<div class="d-flex justify-content-between align-items-center">

<div>

<p class="text-secondary mb-1">

Pesanan

</p>

<h2 class="fw-bold">

{{ $totalOrder }}

</h2>

</div>

<div
class="rounded-circle d-flex justify-content-center align-items-center"
style="width:65px;height:65px;background:#eff6ff;">

<i class="bi bi-receipt fs-2 text-primary"></i>

</div>

</div>

</div>

</div>

</div>

</div>

<div class="card border-0 shadow rounded-4 mt-5">

<div class="card-body">

<div class="row align-items-center">

<div class="col-lg-8">

<h3 class="fw-bold">

Belanja Lebih Mudah

</h3>

<p class="text-secondary">

Jelajahi berbagai kategori produk, tambahkan ke keranjang, lalu checkout hanya dalam beberapa langkah.

</p>

<a
href="{{ route('buyer.marketplace') }}"
class="btn btn-primary rounded-pill px-4">

Lihat Marketplace

</a>

</div>

<div class="col-lg-4 text-end">

<i class="bi bi-shop-window text-primary"
style="font-size:90px;"></i>

</div>

</div>

</div>

</div>

@endsection