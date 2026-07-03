@extends('layouts.buyer')

@section('content')

<div class="container-fluid">

<div class="row g-4">

<div class="col-lg-7">

<div class="card border-0 shadow rounded-4">

<div class="card-body p-4">

@if($product->image)

<img
src="{{ asset('storage/'.$product->image) }}"
class="img-fluid rounded-4 w-100"
style="height:520px;object-fit:cover;">

@else

<img
src="https://placehold.co/900x600"
class="img-fluid rounded-4 w-100"
style="height:520px;object-fit:cover;">

@endif

</div>

</div>

<div class="card border-0 shadow rounded-4 mt-4">

<div class="card-body p-4">

<h4 class="fw-bold mb-3">

Deskripsi Produk

</h4>

<p class="text-secondary mb-0">

{{ $product->description }}

</p>

</div>

</div>

</div>

<div class="col-lg-5">

<div class="card border-0 shadow rounded-4 sticky-top">

<div class="card-body p-4">

<span class="badge bg-primary rounded-pill px-3 py-2 mb-3">

{{ $product->category->name }}

</span>

<h2 class="fw-bold">

{{ $product->name }}

</h2>

<div class="mt-2 mb-3">

<span class="text-warning fs-5">

★★★★★

</span>

<small class="text-secondary">

4.9 (245 Ulasan)

</small>

</div>

<h2 class="fw-bold text-primary mb-4">

Rp {{ number_format($product->price,0,',','.') }}

</h2>

<div class="row text-center mb-4">

<div class="col">

<div class="border rounded-4 py-3">

<h5 class="fw-bold text-primary">

{{ $product->stock }}

</h5>

<small class="text-secondary">

Stock

</small>

</div>

</div>

<div class="col">

<div class="border rounded-4 py-3">

<h6 class="fw-bold">

{{ $product->seller->name }}

</h6>

<small class="text-secondary">

Seller

</small>

</div>

</div>

</div>

<hr>

<div class="d-grid gap-3">

<form
action="{{ route('buyer.cart.add',$product) }}"
method="POST">

@csrf

<button
class="btn btn-primary w-100 py-3 rounded-4 fw-semibold">

<i class="bi bi-cart-plus me-2"></i>

Tambah ke Keranjang

</button>

</form>

<a
href="{{ route('buyer.marketplace') }}"
class="btn btn-outline-primary py-3 rounded-4">

<i class="bi bi-arrow-left me-2"></i>

Kembali ke Marketplace

</a>

</div>

<div class="alert alert-light border rounded-4 mt-4 mb-0">

<div class="d-flex">

<div class="me-3">

<i class="bi bi-shield-check text-primary fs-3"></i>

</div>

<div>

<b>Belanja Aman</b>

<p class="mb-0 text-secondary">

Produk dijual oleh seller terverifikasi dengan sistem transaksi Marketplace.

</p>

</div>

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

transform:translateY(-4px);

box-shadow:0 20px 45px rgba(37,99,235,.15)!important;

}

.badge{

font-size:.9rem;

}

.btn{

transition:.3s;

}

.btn:hover{

transform:translateY(-2px);

}

img{

transition:.35s;

}

img:hover{

transform:scale(1.01);

}

</style>

@endsection