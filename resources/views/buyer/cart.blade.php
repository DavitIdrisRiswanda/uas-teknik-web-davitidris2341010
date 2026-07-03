@extends('layouts.buyer')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            Keranjang Saya

        </h2>

        <p class="text-secondary mb-0">

            Periksa kembali produk sebelum melakukan checkout.

        </p>

    </div>

</div>

@if($cart && $cart->items->count())

@php
$total = 0;
@endphp

<div class="row">

<div class="col-lg-8">

@foreach($cart->items as $item)

@php
$subtotal = $item->qty * $item->product->price;
$total += $subtotal;
@endphp

<div class="card border-0 shadow-sm rounded-4 mb-4">

<div class="card-body">

<div class="row align-items-center">

<div class="col-md-2 text-center">

@if($item->product->image)

<img
src="{{ asset('storage/'.$item->product->image) }}"
class="img-fluid rounded-4"
style="height:90px;width:90px;object-fit:cover;">

@else

<div
class="bg-light rounded-4 d-flex justify-content-center align-items-center"
style="height:90px;width:90px;">

<i class="bi bi-image fs-2 text-secondary"></i>

</div>

@endif

</div>

<div class="col-md-5">

<h5 class="fw-bold">

{{ $item->product->name }}

</h5>

<p class="text-secondary mb-0">

{{ $item->product->category->name }}

</p>

</div>

<div class="col-md-2 text-center">

<span class="badge bg-primary px-3 py-2">

Qty {{ $item->qty }}

</span>

</div>

<div class="col-md-3 text-end">

<h6 class="text-secondary">

Rp {{ number_format($item->product->price,0,',','.') }}

</h6>

<h5 class="fw-bold text-primary">

Rp {{ number_format($subtotal,0,',','.') }}

</h5>

</div>

</div>

</div>

</div>

@endforeach

</div>

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4 sticky-top">

<div class="card-body p-4">

<h4 class="fw-bold mb-4">

Ringkasan Belanja

</h4>

<div class="d-flex justify-content-between mb-3">

<span>Total Produk</span>

<span>

{{ $cart->items->count() }}

</span>

</div>

<div class="d-flex justify-content-between mb-3">

<span>Total Harga</span>

<strong>

Rp {{ number_format($total,0,',','.') }}

</strong>

</div>

<hr>

<div class="d-flex justify-content-between">

<h5>Total Bayar</h5>

<h4 class="text-primary fw-bold">

Rp {{ number_format($total,0,',','.') }}

</h4>

</div>

<a
href="{{ route('buyer.checkout.form') }}"
class="btn btn-primary w-100 py-3 rounded-4 fw-semibold mt-4">

<i class="bi bi-credit-card me-2"></i>

Lanjut Checkout

</a>

<a
href="{{ route('buyer.marketplace') }}"
class="btn btn-outline-primary w-100 mt-3 rounded-4 py-3">

Lanjut Belanja

</a>

</div>

</div>

</div>

</div>

@else

<div class="card border-0 shadow rounded-4">

<div class="card-body text-center py-5">

<i class="bi bi-cart-x display-2 text-primary"></i>

<h3 class="fw-bold mt-4">

Keranjang Masih Kosong

</h3>

<p class="text-secondary">

Belum ada produk yang ditambahkan ke keranjang.

</p>

<a
href="{{ route('buyer.marketplace') }}"
class="btn btn-primary rounded-pill px-5 mt-3">

Mulai Belanja

</a>

</div>

</div>

@endif

@endsection