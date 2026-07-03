@extends('layouts.seller')

@section('content')

<h2 class="fw-bold mb-4">

Edit Produk

</h2>

<form
action="{{ route('seller.products.update',$product) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">

<label>Kategori</label>

<select
name="category_id"
class="form-select">

@foreach($categories as $category)

<option
value="{{ $category->id }}"
{{ $product->category_id == $category->id ? 'selected' : '' }}>

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
class="form-control"
value="{{ $product->name }}">

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="description"
rows="5"
class="form-control">{{ $product->description }}</textarea>

</div>

<div class="row">

<div class="col">

<label>Harga</label>

<input
type="number"
name="price"
class="form-control"
value="{{ $product->price }}">

</div>

<div class="col">

<label>Stock</label>

<input
type="number"
name="stock"
class="form-control"
value="{{ $product->stock }}">

</div>

</div>

<div class="mt-3">

<label>Foto Saat Ini</label>

<br>

@if($product->image)

<img
src="{{ asset('storage/'.$product->image) }}"
width="120"
class="rounded shadow">

@endif

</div>

<div class="mt-3">

<label>Ganti Foto</label>

<input
type="file"
name="image"
class="form-control">

</div>

<button
class="btn btn-warning mt-4">

Update Produk

</button>

</form>

@endsection