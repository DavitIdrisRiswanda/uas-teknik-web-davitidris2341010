@extends('layouts.seller')

@section('content')

<h2 class="fw-bold mb-4">

Tambah Produk

</h2>

<form
action="{{ route('seller.products.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="mb-3">

<label>Kategori</label>

<select
name="category_id"
class="form-select">

@foreach($categories as $category)

<option value="{{ $category->id }}">

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Nama Produk</label>

<input
type="text"
name="name"
class="form-control">

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="description"
class="form-control"
rows="5"></textarea>

</div>

<div class="row">

<div class="col">

<label>Harga</label>

<input
type="number"
name="price"
class="form-control">

</div>

<div class="col">

<label>Stock</label>

<input
type="number"
name="stock"
class="form-control">

</div>

</div>

<div class="mt-3">

<label>Foto Produk</label>

<input
type="file"
name="image"
class="form-control">

</div>

<button
class="btn btn-primary mt-4">

Simpan Produk

</button>

</form>

@endsection