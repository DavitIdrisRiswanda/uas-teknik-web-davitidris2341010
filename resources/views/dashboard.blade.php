@extends('layouts.seller')

@section('content')

<h2>

Halo,

{{ \Illuminate\Support\Str::ascii(auth()->user()->name) }}



</h2>

<p class="text-secondary">

Selamat datang di Dashboard Seller

</p>

<div class="row mt-4">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h1>

{{ $totalProduk }}

</h1>

<p>

Total Produk

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h1>

0

</h1>

<p>

Pesanan

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h1>

Rp0

</h1>

<p>

Pendapatan

</p>

</div>

</div>

</div>

</div>

<div class="mt-5">

<a href="{{ route('seller.products.index') }}"
class="btn btn-primary">

Kelola Produk

</a>

</div>

@endsection