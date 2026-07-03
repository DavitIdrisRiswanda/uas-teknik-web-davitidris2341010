@extends('adminlte::page')

@section('title','Kategori')

@section('content_header')

<h1>Data Kategori</h1>

@stop

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.categories.create') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            Tambah Kategori

        </a>

    </div>

    <div class="card-body">

        @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

        @endif

        <table class="table table-bordered table-striped">

            <thead>

            <tr>

                <th width="70">No</th>

                <th>Nama Kategori</th>

                <th width="200">Aksi</th>

            </tr>

            </thead>

            <tbody>

            @forelse($categories as $category)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $category->name }}

                </td>

                <td>

                    <a href="{{ route('admin.categories.edit',$category) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                        action="{{ route('admin.categories.destroy',$category) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus kategori ini?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3" class="text-center">

                    Belum ada kategori.

                </td>

            </tr>

            @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $categories->links() }}

        </div>

    </div>

</div>

@stop