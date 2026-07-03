@extends('layouts.buyer')

@section('content')

<div class="container-fluid">

<div class="p-5 rounded-4 mb-5 text-white"
style="background:linear-gradient(135deg,#2563eb,#3b82f6);">

<div class="row align-items-center">

<div class="col-lg-8">

<h2 class="fw-bold display-6">

Profil Saya

</h2>

<p class="opacity-75 mb-0">

Kelola informasi akun Marketplace Anda.

</p>

</div>

<div class="col-lg-4 text-end">

<i class="bi bi-person-circle"
style="font-size:120px;opacity:.15;"></i>

</div>

</div>

</div>

<div class="row g-4">

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4">

<div class="card-body text-center p-5">

@if(auth()->user()->photo)

<img
src="{{ asset('storage/'.auth()->user()->photo) }}"
class="rounded-circle shadow mb-4"
style="width:140px;height:140px;object-fit:cover;">

@else

<div
class="rounded-circle mx-auto mb-4 d-flex align-items-center justify-content-center"
style="width:140px;height:140px;background:#eff6ff;">

<i class="bi bi-person-fill text-primary"
style="font-size:65px;"></i>

</div>

@endif

<h3 class="fw-bold">

{{ auth()->user()->name }}

</h3>

<p class="text-secondary">

{{ auth()->user()->email }}

</p>

<span class="badge bg-primary rounded-pill px-4 py-2">

Buyer

</span>

<hr>

<form action="#" method="POST" enctype="multipart/form-data">

@csrf

<input
type="file"
class="form-control mb-3">

<button
class="btn btn-primary rounded-pill w-100">

<i class="bi bi-camera-fill me-2"></i>

Upload Foto

</button>

</form>

</div>

</div>

</div>

<div class="col-lg-8">

<div class="card border-0 shadow rounded-4">

<div class="card-body p-5">

<h4 class="fw-bold mb-4">

Informasi Akun

</h4>

<div class="row mb-3">

<div class="col-md-4">

<label>Nama Lengkap</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->name }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Username</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->username ?? '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Email</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->email }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>No. Handphone</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->phone ?? '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Jenis Kelamin</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->gender ?? '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Tanggal Lahir</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->birth_date
? auth()->user()->birth_date->format('d F Y')
: '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Alamat Lengkap</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->address ?? '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Kota / Kabupaten</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->city ?? '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Provinsi</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->province ?? '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Kode Pos</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->postal_code ?? '-' }}

</div>

</div>

<hr>

<div class="row my-3">

<div class="col-md-4">

<label>Role</label>

</div>

<div class="col-md-8">

<span class="badge bg-primary">

{{ ucfirst(auth()->user()->role) }}

</span>

</div>

</div>

<hr>

<div class="row mt-3">

<div class="col-md-4">

<label>Bergabung</label>

</div>

<div class="col-md-8 fw-semibold">

{{ auth()->user()->created_at->format('d F Y') }}

</div>

</div>

<div class="mt-5 d-flex gap-3">

<a
href="{{ route('profile.edit') }}"
class="btn btn-primary rounded-pill px-4">

<i class="bi bi-pencil-square me-2"></i>

Edit Profil

</a>

<a
href="{{ route('password.request') }}"
class="btn btn-outline-primary rounded-pill px-4">

<i class="bi bi-shield-lock me-2"></i>

Ganti Password

</a>

</div>

</div>

</div>

</div>

</div>

</div>

<style>

.card{

transition:.3s;

}

.card:hover{

transform:translateY(-5px);

box-shadow:0 20px 40px rgba(37,99,235,.12)!important;

}

label{

font-weight:600;

color:#6c757d;

}

</style>

@endsection