@extends('layouts.seller')

@section('content')

<div class="container-fluid">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h2 class="fw-bold">

Pesanan Masuk

</h2>

<p class="text-secondary mb-0">

Kelola seluruh pesanan yang masuk ke tokomu.

</p>

</div>

</div>

@if(session('success'))

<div class="alert alert-success rounded-4">

{{ session('success') }}

</div>

@endif

@forelse($orders as $order)

<div class="card border-0 shadow rounded-4 mb-5">

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

<span class="badge bg-warning text-dark rounded-pill px-3 py-2">

Pending

</span>

@elseif($order->status=='paid')

<span class="badge bg-info rounded-pill px-3 py-2">

Paid

</span>

@elseif($order->status=='shipped')

<span class="badge bg-primary rounded-pill px-3 py-2">

Shipped

</span>

@else

<span class="badge bg-success rounded-pill px-3 py-2">

Completed

</span>

@endif

</div>

</div>

</div>

<div class="card-body p-4">

<div class="row g-4 mb-4">

<div class="col-lg-6">

<div class="border rounded-4 p-4 h-100">

<h5 class="fw-bold mb-3">

<i class="bi bi-person-fill me-2 text-primary"></i>

Data Pembeli

</h5>

<p class="mb-2">

<strong>{{ $order->buyer->name }}</strong>

</p>

<p class="mb-2">

{{ $order->receiver_phone }}

</p>

<p class="mb-0">

{{ $order->buyer->email }}

</p>

</div>

</div>

<div class="col-lg-6">

<div class="border rounded-4 p-4 h-100">

<h5 class="fw-bold mb-3">

<i class="bi bi-geo-alt-fill me-2 text-danger"></i>

Alamat Pengiriman

</h5>

<p class="mb-1">

<strong>{{ $order->receiver_name }}</strong>

</p>

<p class="mb-1">

{{ $order->receiver_address }}

</p>

<p class="mb-0">

{{ $order->city }},

{{ $order->province }}

{{ $order->postal_code }}

</p>

</div>

</div>

</div>

<div class="row g-4 mb-4">

<div class="col-lg-6">

<div class="border rounded-4 p-4 h-100">

<h5 class="fw-bold mb-3">

<i class="bi bi-truck me-2 text-success"></i>

Pengiriman

</h5>

<p class="mb-2">

Kurir :

<strong>

{{ $order->shipping_method }}

</strong>

</p>

<p class="mb-0">

Ongkir :

<strong>

Rp {{ number_format($order->shipping_cost,0,',','.') }}

</strong>

</p>

</div>

</div>

<div class="col-lg-6">

<div class="border rounded-4 p-4 h-100">

<h5 class="fw-bold mb-3">

<i class="bi bi-credit-card me-2 text-primary"></i>

Pembayaran

</h5>

<p class="mb-2">

{{ $order->payment_method }}

</p>

@if($order->notes)

<hr>

<p class="mb-0">

<b>Catatan :</b>

{{ $order->notes }}

</p>

@endif

</div>

</div>

</div>

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>Produk</th>

<th class="text-center">

Qty

</th>

<th class="text-end">

Harga

</th>

<th class="text-end">

Subtotal

</th>

</tr>

</thead>

<tbody>

@foreach($order->items as $item)

@if($item->product->seller_id == auth()->id())

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

{{ $item->qty }}

</td>

<td class="text-end">

Rp {{ number_format($item->price,0,',','.') }}

</td>

<td class="text-end fw-bold text-primary">

Rp {{ number_format($item->price * $item->qty,0,',','.') }}

</td>

</tr>

@endif

@endforeach

</tbody>

</table>

</div>

<hr>

<div class="row align-items-center">

<div class="col-lg-6">

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

<div class="col-lg-6">

<form action="{{ route('seller.orders.update',$order) }}" method="POST">

@csrf

@method('PATCH')

<div class="d-flex justify-content-end gap-2">

<select
name="status"
class="form-select"
style="max-width:220px;">

<option value="pending" {{ $order->status=='pending'?'selected':'' }}>

Pending

</option>

<option value="paid" {{ $order->status=='paid'?'selected':'' }}>

Paid

</option>

<option value="shipped" {{ $order->status=='shipped'?'selected':'' }}>

Shipped

</option>

<option value="completed" {{ $order->status=='completed'?'selected':'' }}>

Completed

</option>

</select>

<button class="btn btn-primary px-4">

<i class="bi bi-check-circle me-2"></i>

Update

</button>

</div>

</form>

</div>

</div>

</div>

</div>

@empty

<div class="card border-0 shadow rounded-4">

<div class="card-body text-center py-5">

<i class="bi bi-box-seam display-2 text-primary"></i>

<h3 class="fw-bold mt-4">

Belum Ada Pesanan

</h3>

<p class="text-secondary">

Pesanan dari pembeli akan muncul di halaman ini.

</p>

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