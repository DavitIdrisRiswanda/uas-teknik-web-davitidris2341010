@extends('layouts.seller')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-0">

            Produk Saya

        </h2>

        <small class="text-muted">

            Kelola semua produk yang kamu jual.

        </small>

    </div>

    <a href="{{ route('seller.products.create') }}"
       class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Tambah Produk

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card shadow-sm border-0">

<div class="card-body">

<table class="table table-hover align-middle">

<thead>

<tr>

<th>Foto</th>

<th>Produk</th>

<th>Kategori</th>

<th>Harga</th>

<th>Stock</th>

<th width="170">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($products as $product)

<tr>

<td width="90">

@if($product->image)

<img src="{{ asset('storage/'.$product->image) }}"
     width="70"
     class="rounded">

@else

<img src="https://placehold.co/70x70"
     class="rounded">

@endif

</td>

<td>

<b>

{{ $product->name }}

</b>

</td>

<td>

<span class="badge bg-secondary">

{{ $product->category->name }}

</span>

</td>

<td>

Rp {{ number_format($product->price,0,',','.') }}

</td>

<td>

<span class="badge bg-success">

{{ $product->stock }}

</span>

</td>

<td>

<a href="{{ route('seller.products.edit',$product) }}"
class="btn btn-warning btn-sm">

Edit

</a>

<form
action="{{ route('seller.products.destroy',$product) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus produk?')">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="6"
class="text-center">

Belum ada produk.

</td>

</tr>

@endforelse

</tbody>

</table>

<div class="mt-3">

{{ $products->links() }}

</div>

</div>

</div>

@endsection