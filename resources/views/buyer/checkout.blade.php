@extends('layouts.buyer')

@section('content')

<form action="{{ route('buyer.checkout') }}" method="POST">

@csrf

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2 class="fw-bold">

Checkout

</h2>

<p class="text-secondary mb-0">

Lengkapi data pengiriman sebelum membuat pesanan.

</p>

</div>

<a
href="{{ route('buyer.cart') }}"
class="btn btn-outline-primary rounded-pill">

<i class="bi bi-arrow-left me-2"></i>

Kembali

</a>

</div>

<div class="row">

<div class="col-lg-8">

<div class="card border-0 shadow rounded-4 mb-4">

<div class="card-body p-4">

<h4 class="fw-bold mb-4">

<i class="bi bi-person-vcard me-2 text-primary"></i>

Data Penerima

</h4>

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">

Nama Penerima

</label>

<input
type="text"
name="receiver_name"
class="form-control rounded-3"
value="{{ auth()->user()->name }}"
required>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">

Nomor Handphone

</label>

<input
type="text"
name="receiver_phone"
class="form-control rounded-3"
value="{{ auth()->user()->phone }}"
required>

</div>

<div class="col-12 mb-3">

<label class="form-label">

Alamat Lengkap

</label>

<textarea
name="receiver_address"
rows="4"
class="form-control rounded-3"
required>{{ auth()->user()->address }}</textarea>

</div>

<div class="col-md-4 mb-3">

<label class="form-label">

Kota / Kabupaten

</label>

<input
type="text"
name="city"
class="form-control rounded-3"
value="{{ auth()->user()->city }}"
required>

</div>

<div class="col-md-4 mb-3">

<label class="form-label">

Provinsi

</label>

<input
type="text"
name="province"
class="form-control rounded-3"
value="{{ auth()->user()->province }}"
required>

</div>

<div class="col-md-4 mb-3">

<label class="form-label">

Kode Pos

</label>

<input
type="text"
name="postal_code"
class="form-control rounded-3"
value="{{ auth()->user()->postal_code }}"
required>

</div>

<div class="col-12">

<label class="form-label">

Catatan Untuk Penjual

</label>

<textarea
name="notes"
rows="3"
class="form-control rounded-3"
placeholder="Contoh: Titip di satpam atau jangan dibunyikan bel."></textarea>

</div>

</div>

</div>

</div>

<div class="card border-0 shadow rounded-4 mb-4">

<div class="card-body p-4">

<h4 class="fw-bold mb-4">

<i class="bi bi-truck me-2 text-primary"></i>

Metode Pengiriman

</h4>

<div class="form-check border rounded-4 p-3 mb-3">

<input
class="form-check-input shipping"
type="radio"
name="shipping_method"
id="jne"
value="JNE REG"
data-price="15000"
checked>

<label
class="form-check-label w-100"
for="jne">

<div class="d-flex justify-content-between">

<div>

<strong>JNE REG</strong>

<br>

<small class="text-secondary">

Estimasi 2 - 4 Hari

</small>

</div>

<strong>

Rp15.000

</strong>

</div>

</label>

</div>

<div class="form-check border rounded-4 p-3 mb-3">

<input
class="form-check-input shipping"
type="radio"
name="shipping_method"
id="jnt"
value="J&T Express"
data-price="12000">

<label
class="form-check-label w-100"
for="jnt">

<div class="d-flex justify-content-between">

<div>

<strong>J&T Express</strong>

<br>

<small class="text-secondary">

Estimasi 2 - 3 Hari

</small>

</div>

<strong>

Rp12.000

</strong>

</div>

</label>

</div>

<div class="form-check border rounded-4 p-3 mb-3">

<input
class="form-check-input shipping"
type="radio"
name="shipping_method"
id="sicepat"
value="SiCepat"
data-price="10000">

<label
class="form-check-label w-100"
for="sicepat">

<div class="d-flex justify-content-between">

<div>

<strong>SiCepat</strong>

<br>

<small class="text-secondary">

Estimasi 1 - 2 Hari

</small>

</div>

<strong>

Rp10.000

</strong>

</div>

</label>

</div>

<div class="form-check border rounded-4 p-3">

<input
class="form-check-input shipping"
type="radio"
name="shipping_method"
id="cod"
value="COD"
data-price="0">

<label
class="form-check-label w-100"
for="cod">

<div class="d-flex justify-content-between">

<div>

<strong>Cash On Delivery</strong>

<br>

<small class="text-secondary">

Bayar di Tempat

</small>

</div>

<strong>

Gratis

</strong>

</div>

</label>

</div>

</div>

</div>

<div class="card border-0 shadow rounded-4">

<div class="card-body p-4">

<h4 class="fw-bold mb-4">

<i class="bi bi-credit-card me-2 text-primary"></i>

Metode Pembayaran

</h4>

<div class="form-check mb-3">

<input
class="form-check-input"
type="radio"
name="payment_method"
value="Transfer Bank"
checked>

<label class="form-check-label">

Transfer Bank

</label>

</div>

<div class="form-check mb-3">

<input
class="form-check-input"
type="radio"
name="payment_method"
value="QRIS">

<label class="form-check-label">

QRIS

</label>

</div>

<div class="form-check mb-3">

<input
class="form-check-input"
type="radio"
name="payment_method"
value="E-Wallet">

<label class="form-check-label">

E-Wallet

</label>

</div>

<div class="form-check">

<input
class="form-check-input"
type="radio"
name="payment_method"
value="COD">

<label class="form-check-label">

Cash On Delivery (COD)

</label>

</div>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4 sticky-top">

<div class="card-body p-4">

<h4 class="fw-bold mb-4">

<i class="bi bi-receipt-cutoff me-2 text-primary"></i>

Ringkasan Pesanan

</h4>

@php

$subtotal = 0;

foreach($cart->items as $item){

$subtotal += $item->qty * $item->product->price;

}

@endphp

<div class="d-flex justify-content-between mb-3">

<span>Jumlah Produk</span>

<strong>

{{ $cart->items->count() }}

</strong>

</div>

<div class="d-flex justify-content-between mb-3">

<span>Subtotal</span>

<strong>

Rp {{ number_format($subtotal,0,',','.') }}

</strong>

</div>

<div class="d-flex justify-content-between mb-3">

<span>Ongkos Kirim</span>

<strong id="shippingText">

Rp15.000

</strong>

</div>

<hr>

<div class="d-flex justify-content-between align-items-center">

<h5 class="fw-bold">

Total Bayar

</h5>

<h4
id="totalText"
class="fw-bold text-primary">

Rp {{ number_format($subtotal+15000,0,',','.') }}

</h4>

</div>

<input
type="hidden"
id="shipping_cost"
name="shipping_cost"
value="15000">

<input
type="hidden"
name="subtotal"
value="{{ $subtotal }}">

<div class="d-grid mt-4">

<button
class="btn btn-primary btn-lg rounded-4">

<i class="bi bi-bag-check-fill me-2"></i>

Buat Pesanan

</button>

</div>

<a
href="{{ route('buyer.cart') }}"
class="btn btn-outline-primary w-100 rounded-4 mt-3">

Kembali ke Keranjang

</a>

</div>

</div>

</div>

</div>

</div>

</form>

<script>

const subtotal={{ $subtotal }};

const shipping=document.querySelectorAll('.shipping');

const shippingText=document.getElementById('shippingText');

const totalText=document.getElementById('totalText');

const shippingCost=document.getElementById('shipping_cost');

shipping.forEach(item=>{

item.addEventListener('change',function(){

let ongkir=parseInt(this.dataset.price);

shippingCost.value=ongkir;

shippingText.innerHTML='Rp '+ongkir.toLocaleString('id-ID');

totalText.innerHTML='Rp '+(subtotal+ongkir).toLocaleString('id-ID');

});

});

</script>

<style>

.form-check{

cursor:pointer;

transition:.25s;

}

.form-check:hover{

background:#f8fbff;

border-color:#2563eb!important;

}

.card{

transition:.3s;

}

.card:hover{

transform:translateY(-3px);

box-shadow:0 15px 35px rgba(37,99,235,.12)!important;

}

</style>

@endsection