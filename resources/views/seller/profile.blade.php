@extends('layouts.seller')

@section('content')

<div class="container-fluid">

<div class="p-5 rounded-4 mb-5 text-white"
style="background:linear-gradient(135deg,#2563eb,#3b82f6);">

<div class="row align-items-center">

<div class="col-lg-8">

<h2 class="fw-bold display-6">

Profil Seller

</h2>

<p class="opacity-75 mb-0">

Kelola informasi akun dan identitas tokomu.

</p>

</div>

<div class="col-lg-4 text-end">

<i class="bi bi-person-badge"
style="font-size:120px;opacity:.15;"></i>

</div>

</div>

</div>

<div class="row">

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4">

<div class="card-body text-center p-5">

@if(auth()->user()->photo)

<img
src="{{ asset('storage/'.auth()->user()->photo) }}"
class="rounded-circle shadow mb-4"
style="width:130px;height:130px;object-fit:cover;">

@else

<img
src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2563eb&color=fff&size=256"
class="rounded-circle shadow mb-4"
style="width:130px;height:130px;">

@endif

<h3 class="fw-bold">

{{ auth()->user()->name }}

</h3>

<p class="text-secondary mb-2">

{{ auth()->user()->email }}

</p>

<span class="badge bg-primary rounded-pill px-4 py-2">

Seller

</span>

<hr>

<div class="text-start">

<p>

<b>Bergabung</b>

<br>

{{ auth()->user()->created_at->format('d F Y') }}

</p>

<p>

<b>Total Produk</b>

<br>

{{ $totalProduk }}

</p>

<p>

<b>Total Pesanan</b>

<br>

{{ $totalPesanan }}

</p>

<p class="mb-0">

<b>Total Pendapatan</b>

<br>

Rp {{ number_format($pendapatan,0,',','.') }}

</p>

</div>

</div>

</div>

</div>

<div class="col-lg-8">

<div class="card border-0 shadow rounded-4">

<div class="card-body p-5">

<h4 class="fw-bold mb-4">

Informasi Akun

</h4>

<div class="row mb-4">

<div class="col-md-4">

<label class="text-secondary">

Nama Lengkap

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->name }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Username

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->username ?? '-' }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Email

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->email }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Nomor HP

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->phone ?? '-' }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Jenis Kelamin

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->gender ?? '-' }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Tanggal Lahir

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->birth_date ?? '-' }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Alamat

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->address ?? '-' }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Kota

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->city ?? '-' }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Provinsi

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->province ?? '-' }}

</div>

</div>

</div>

<hr>

<div class="row my-4">

<div class="col-md-4">

<label class="text-secondary">

Kode Pos

</label>

</div>

<div class="col-md-8">

<div class="fw-semibold">

{{ auth()->user()->postal_code ?? '-' }}

</div>

</div>

</div>

<div class="mt-5">

<a
href="{{ route('profile.edit') }}"
class="btn btn-primary rounded-pill px-4">

<i class="bi bi-pencil-square me-2"></i>

Edit Profil

</a>

</div>

</div>

</div>

</div>

</div>

</div>

<style>

.card{

transition:.35s;

}

.card:hover{

transform:translateY(-5px);

box-shadow:0 20px 40px rgba(37,99,235,.12)!important;

}

label{

font-weight:500;

}

</style>

@endsection