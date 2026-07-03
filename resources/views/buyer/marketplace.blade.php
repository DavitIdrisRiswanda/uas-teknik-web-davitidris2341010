@extends('layouts.buyer')

@section('content')

<div class="container-fluid">

<div class="p-5 rounded-4 mb-5 text-white"
style="background:linear-gradient(135deg,#2563eb,#3b82f6);">

<div class="row align-items-center">

<div class="col-lg-8">

<h2 class="fw-bold display-6">

Temukan Produk Favoritmu

</h2>

<p class="mt-3 opacity-75">

Jelajahi berbagai produk pilihan dengan harga terbaik dan kualitas terpercaya.

</p>

<form method="GET" class="mt-4">

<div class="input-group">

<input

type="text"

name="search"

value="{{ request('search') }}"

class="form-control rounded-start-pill border-0 py-3"

placeholder="Cari produk...">

<button

class="btn btn-light rounded-end-pill px-4">

<i class="bi bi-search"></i>

</button>

</div>

</form>

</div>

<div class="col-lg-4 text-end">

<i class="bi bi-shop-window"
style="font-size:130px;opacity:.15;"></i>

</div>

</div>

</div>

<div class="row g-4">

@forelse($products as $product)

<div class="col-lg-3 col-md-6">

<div class="card border-0 shadow-sm rounded-4 h-100 product-card">

@if($product->image)

<img

src="{{ asset('storage/'.$product->image) }}"

class="card-img-top"

style="height:240px;object-fit:cover;">

@else

<img

src="https://placehold.co/600x600"

class="card-img-top"

style="height:240px;object-fit:cover;">

@endif

<div class="card-body d-flex flex-column">

<span class="badge bg-primary rounded-pill mb-3 align-self-start">

{{ $product->category->name }}

</span>

<h5 class="fw-bold">

{{ $product->name }}

</h5>

<div class="mt-2 mb-2">

<span class="text-warning">

★★★★★

</span>

<small class="text-muted">

(4.9)

</small>

</div>

<h4 class="fw-bold text-primary">

Rp {{ number_format($product->price,0,',','.') }}

</h4>

<p class="text-secondary mb-3">

Stock :

<b>

{{ $product->stock }}

</b>

</p>

<div class="mt-auto">

<a

href="{{ route('buyer.product.show',$product) }}"

class="btn btn-primary rounded-pill w-100">

<i class="bi bi-eye me-2"></i>

Lihat Detail

</a>

</div>

</div>

</div>

</div>

@empty

<div class="col-12">

<div class="card border-0 shadow rounded-4">

<div class="card-body text-center py-5">

<i class="bi bi-box-seam display-2 text-primary"></i>

<h3 class="fw-bold mt-4">

Produk Belum Tersedia

</h3>

<p class="text-secondary">

Belum ada produk yang ditampilkan.

</p>

</div>

</div>

</div>

@endforelse

</div>

<div class="d-flex justify-content-center mt-5">

{{ $products->links() }}

</div>

</div>

<style>

.product-card{

transition:.35s;

overflow:hidden;

}

.product-card:hover{

transform:translateY(-10px);

box-shadow:0 20px 45px rgba(37,99,235,.18)!important;

}

.product-card img{

transition:.35s;

}

.product-card:hover img{

transform:scale(1.05);

}

.card{

border-radius:22px;

}

</style>

@endsection