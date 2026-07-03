@extends('adminlte::page')

@section('title', 'Data Transaksi')

@section('content_header')

<h1>Data Transaksi</h1>

@stop

@section('content')

<div class="card">

    <div class="card-header">

        <h3 class="card-title">

            Seluruh Transaksi Marketplace

        </h3>

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

                    <th width="70">ID</th>

                    <th>Buyer</th>

                    <th>Seller</th>

                    <th>Total</th>

                    <th>Status</th>

                    <th>Tanggal</th>

                </tr>

            </thead>

            <tbody>

                @forelse($orders as $order)

                <tr>

                    <td>

                        #{{ $order->id }}

                    </td>

                    <td>

                        {{ $order->buyer->name }}

                    </td>

                    <td>

                        @php
                            $seller = $order->items->first()?->product?->seller;
                        @endphp

                        {{ $seller ? $seller->name : '-' }}

                    </td>

                    <td>

                        Rp {{ number_format($order->total,0,',','.') }}

                    </td>

                    <td>

                        @if($order->status == 'pending')

                            <span class="badge badge-warning">

                                Pending

                            </span>

                        @elseif($order->status == 'paid')

                            <span class="badge badge-info">

                                Paid

                            </span>

                        @elseif($order->status == 'shipped')

                            <span class="badge badge-primary">

                                Shipped

                            </span>

                        @elseif($order->status == 'completed')

                            <span class="badge badge-success">

                                Completed

                            </span>

                        @endif

                    </td>

                    <td>

                        {{ $order->created_at->format('d M Y H:i') }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada transaksi.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        <div class="mt-3">

            {{ $orders->links() }}

        </div>

    </div>

</div>

@stop