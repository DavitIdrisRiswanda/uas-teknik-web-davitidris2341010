@extends('layouts.admin')

@section('content')

<h2>Edit Kategori</h2>

<form action="{{ route('admin.categories.update',$category->id) }}"
method="POST">

@csrf
@method('PUT')

<label>Nama Kategori</label>

<input
type="text"
name="name"
value="{{ $category->name }}">

<br><br>

<button>

Update

</button>

</form>

@endsection