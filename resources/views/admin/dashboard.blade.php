@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')

<h1>Dashboard Admin</h1>

@stop

@section('content')

<div class="row">

    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>{{ $totalUser }}</h3>

                <p>Total User</p>

            </div>

            <div class="icon">

                <i class="fas fa-users"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>{{ $totalSeller }}</h3>

                <p>Seller</p>

            </div>

            <div class="icon">

                <i class="fas fa-store"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $totalBuyer }}</h3>

                <p>Buyer</p>

            </div>

            <div class="icon">

                <i class="fas fa-user"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>{{ $totalProduk }}</h3>

                <p>Produk</p>

            </div>

            <div class="icon">

                <i class="fas fa-box"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>{{ $totalOrder }}</h3>

                <p>Order</p>

            </div>

            <div class="icon">

                <i class="fas fa-shopping-cart"></i>

            </div>

        </div>

    </div>

    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-secondary">

            <div class="inner">

                <h3>Rp {{ number_format($pendapatan,0,',','.') }}</h3>

                <p>Pendapatan</p>

            </div>

            <div class="icon">

                <i class="fas fa-money-bill-wave"></i>

            </div>

        </div>

    </div>

</div>

<div class="card shadow">

    <div class="card-header">

        <h3 class="card-title">

            📈 Statistik Order Bulanan

        </h3>

    </div>

    <div class="card-body">

        <canvas id="orderChart" height="90"></canvas>

    </div>

</div>

<div class="card mt-4">

    <div class="card-header">

        <h3 class="card-title">

            Order Terbaru

        </h3>

    </div>

    <div class="card-body p-0">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Buyer</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Tanggal</th>

                </tr>

            </thead>

            <tbody>

                @forelse($orders as $order)

                <tr>

                    <td>#{{ $order->id }}</td>

                    <td>{{ $order->buyer->name }}</td>

                    <td>

                        @if($order->status=='pending')

                            <span class="badge badge-warning">Pending</span>

                        @elseif($order->status=='paid')

                            <span class="badge badge-info">Paid</span>

                        @elseif($order->status=='shipped')

                            <span class="badge badge-primary">Shipped</span>

                        @else

                            <span class="badge badge-success">Completed</span>

                        @endif

                    </td>

                    <td>

                        Rp {{ number_format($order->total,0,',','.') }}

                    </td>

                    <td>

                        {{ $order->created_at->format('d-m-Y') }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Belum ada transaksi.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('orderChart');

new Chart(ctx,{

    type:'line',

    data:{

        labels:[
            @foreach($chart as $item)
                '{{ $item->month }}',
            @endforeach
        ],

        datasets:[{

            label:'Jumlah Order',

            data:[
                @foreach($chart as $item)
                    {{ $item->total }},
                @endforeach
            ],

            borderWidth:3,

            tension:.4,

            fill:true,

            backgroundColor:'rgba(54,162,235,.15)',

            borderColor:'rgb(54,162,235)'

        }]

    },

    options:{

        responsive:true,

        plugins:{

            legend:{
                display:true
            }

        }

    }

});

</script>

@stop