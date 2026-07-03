@extends('layouts.buyer')

@section('content')

<div class="container-fluid">

<div class="p-5 rounded-4 mb-5 text-white"
style="background:linear-gradient(135deg,#2563eb,#3b82f6);">

<div class="row align-items-center">

<div class="col-lg-8">

<h2 class="fw-bold display-6">

Pesanan Saya

</h2>

<p class="opacity-75 mb-0">

Pantau status seluruh pesanan dan riwayat transaksi Anda.

</p>

</div>

<div class="col-lg-4 text-end">

<i class="bi bi-receipt-cutoff"
style="font-size:120px;opacity:.15;"></i>

</div>

</div>

</div>

@if(session('success'))

<div class="alert alert-success rounded-4">

{{ session('success') }}

</div>

@endif

@forelse($orders as $order)

<div class="card border-0 shadow rounded-4 mb-4">

<div class="card-header bg-white border-0 p-4">

<div class="d-flex justify-content-between align-items-center flex-wrap">

<div>

<h5 class="fw-bold mb-1">

Order #{{ $order->id }}

</h5>

<small class="text-secondary">

<i class="bi bi-calendar-event me-1"></i>

{{ $order->created_at->format('d F Y H:i') }}

</small>

</div>

<div>

@if($order->status=='pending')

<span class="badge rounded-pill bg-warning text-dark px-3 py-2">

Pending

</span>

@elseif($order->status=='paid')

<span class="badge rounded-pill bg-info px-3 py-2">

Paid

</span>

@elseif($order->status=='shipped')

<span class="badge rounded-pill bg-primary px-3 py-2">

Shipped

</span>

@else

<span class="badge rounded-pill bg-success px-3 py-2">

Completed

</span>

@endif

</div>

</div>

</div>

<div class="card-body">

<div class="table-responsive">
    <div class="row mb-4">

<div class="col-lg-6">

<div class="border rounded-4 p-4 h-100">

<h6 class="fw-bold mb-3">

<i class="bi bi-geo-alt-fill text-danger me-2"></i>

Alamat Pengiriman

</h6>

<p class="mb-1">

<strong>{{ $order->receiver_name }}</strong>

</p>

<p class="mb-1">

{{ $order->receiver_phone }}

</p>

<p class="mb-1">

{{ $order->receiver_address }}

</p>

<p class="mb-0">

{{ $order->city }}, {{ $order->province }}

{{ $order->postal_code }}

</p>

</div>

</div>

<div class="col-lg-6">

<div class="border rounded-4 p-4 h-100">

<h6 class="fw-bold mb-3">

<i class="bi bi-truck text-primary me-2"></i>

Informasi Pengiriman

</h6>

<div class="d-flex justify-content-between mb-2">

<span>Kurir</span>

<strong>

{{ $order->shipping_method }}

</strong>

</div>

<div class="d-flex justify-content-between mb-2">

<span>Ongkir</span>

<strong>

Rp {{ number_format($order->shipping_cost,0,',','.') }}

</strong>

</div>

<div class="d-flex justify-content-between">

<span>Pembayaran</span>

<span class="badge bg-success">

{{ $order->payment_method }}

</span>

</div>

@if($order->notes)

<hr>

<h6 class="fw-bold">

Catatan

</h6>

<p class="text-secondary mb-0">

{{ $order->notes }}

</p>

@endif

</div>

</div>

</div>

<table class="table align-middle">

<thead>

<tr>

<th>Produk</th>

<th class="text-center">Qty</th>

<th class="text-end">Harga</th>

<th class="text-end">Subtotal</th>

</tr>

</thead>

<tbody>

@foreach($order->items as $item)

<tr>

<td>

<div class="d-flex align-items-center">

@if($item->product->image)

<img
src="{{ asset('storage/'.$item->product->image) }}"
class="rounded-3 me-3"
style="width:70px;height:70px;object-fit:cover;">

@endif

<div>

<div class="fw-semibold">

{{ $item->product->name }}

</div>

<small class="text-secondary">

{{ $item->product->category->name }}

</small>

</div>

</div>

</td>

<td class="text-center">

<span class="badge bg-light text-dark">

{{ $item->qty }}

</span>

</td>

<td class="text-end">

Rp {{ number_format($item->price,0,',','.') }}

</td>

<td class="text-end fw-bold text-primary">

Rp {{ number_format($item->price * $item->qty,0,',','.') }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<hr>
<div class="row">

<div class="col-md-6 offset-md-6">

<table class="table table-borderless mb-0">

<tr>

<td>

Subtotal

</td>

<td class="text-end">

Rp {{ number_format($order->total - $order->shipping_cost,0,',','.') }}

</td>

</tr>

<tr>

<td>

Ongkir

</td>

<td class="text-end">

Rp {{ number_format($order->shipping_cost,0,',','.') }}

</td>

</tr>

<tr class="border-top">

<td>

<h5 class="fw-bold">

Total

</h5>

</td>

<td class="text-end">

<h4 class="fw-bold text-primary">

Rp {{ number_format($order->total,0,',','.') }}

</h4>

</td>

</tr>

</table>

</div>

</div>

</div>

</div>

@empty

<div class="card border-0 shadow rounded-4">

<div class="card-body text-center py-5">

<i class="bi bi-cart-x display-2 text-primary"></i>

<h3 class="fw-bold mt-4">

Belum Ada Pesanan

</h3>

<p class="text-secondary">

Produk yang sudah di-checkout akan muncul di halaman ini.

</p>

<a
href="{{ route('buyer.marketplace') }}"
class="btn btn-primary rounded-pill px-5 mt-3">

Mulai Belanja

</a>

</div>

</div>

@endforelse

</div>

<style>

.card{

transition:.3s;

}

.card:hover{

transform:translateY(-4px);

}

.table td{

vertical-align:middle;

}

.badge{

font-size:.85rem;

}

</style>

@endsection