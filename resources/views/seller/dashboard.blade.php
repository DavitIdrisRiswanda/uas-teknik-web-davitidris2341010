@extends('layouts.seller')

@section('content')

<div class="container-fluid">

<div class="p-5 rounded-4 mb-5 text-white"
style="background:linear-gradient(135deg,#2563eb,#3b82f6);">

<div class="row align-items-center">

<div class="col-lg-8">

<h2 class="fw-bold display-6">

Dashboard Seller

</h2>

<p class="opacity-75 mb-0">

Selamat datang kembali,

<b>{{ auth()->user()->name }}</b>.
Kelola toko, pantau penjualan, dan lihat perkembangan bisnis Anda.

</p>

</div>

<div class="col-lg-4 text-end">

<i class="bi bi-shop"
style="font-size:120px;opacity:.15;"></i>

</div>

</div>

</div>

<div class="row g-4 mb-5">

<div class="col-lg-3 col-md-6">

<div class="card border-0 shadow rounded-4 h-100">

<div class="card-body">

<p class="text-secondary mb-2">

Total Produk

</p>

<h2 class="fw-bold text-primary">

{{ $totalProduk }}

</h2>

</div>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="card border-0 shadow rounded-4 h-100">

<div class="card-body">

<p class="text-secondary mb-2">

Total Pesanan

</p>

<h2 class="fw-bold text-success">

{{ $totalPesanan }}

</h2>

</div>

</div>

</div>

<div class="col-lg-2 col-md-6">

<div class="card border-0 shadow rounded-4 h-100">

<div class="card-body">

<p class="text-secondary mb-2">

Pending

</p>

<h2 class="fw-bold text-warning">

{{ $pending }}

</h2>

</div>

</div>

</div>

<div class="col-lg-2 col-md-6">

<div class="card border-0 shadow rounded-4 h-100">

<div class="card-body">

<p class="text-secondary mb-2">

Pendapatan

</p>

<h5 class="fw-bold text-danger">

Rp {{ number_format($pendapatan,0,',','.') }}

</h5>

</div>

</div>

</div>

<div class="col-lg-2 col-md-6">

<div class="card border-0 shadow rounded-4 h-100">

<div class="card-body">

<p class="text-secondary mb-2">

Bulan Ini

</p>

<h5 class="fw-bold text-primary">

Rp {{ number_format($penjualanBulanIni,0,',','.') }}

</h5>

</div>

</div>

</div>

</div>

<div class="card border-0 shadow rounded-4 mb-5">

<div class="card-header bg-white border-0 py-3">

<h5 class="fw-bold mb-0">

Statistik Penjualan Tahun {{ now()->year }}

</h5>

</div>

<div class="card-body">

<canvas id="salesChart" height="95"></canvas>

</div>

</div>

<div class="row">

<div class="col-lg-8">

<div class="card border-0 shadow rounded-4">

<div class="card-header bg-white border-0 py-3">

<h5 class="fw-bold mb-0">

Pesanan Terbaru

</h5>

</div>

<div class="card-body">

@if($orders->count())

<div class="table-responsive">

<table class="table align-middle">

<thead>

<tr>

<th>Order</th>

<th>Pembeli</th>

<th>Status</th>

<th>Total</th>

</tr>

</thead>

<tbody>

@foreach($orders as $order)

<tr>

<td>

#{{ $order->id }}

</td>

<td>

{{ $order->buyer->name }}

</td>

<td>

@if($order->status=='pending')

<span class="badge bg-warning text-dark">

Pending

</span>

@elseif($order->status=='paid')

<span class="badge bg-info">

Paid

</span>

@elseif($order->status=='shipped')

<span class="badge bg-primary">

Shipped

</span>

@else

<span class="badge bg-success">

Completed

</span>

@endif

</td>

<td class="fw-bold">

Rp {{ number_format($order->total,0,',','.') }}

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@else

<div class="alert alert-info mb-0">

Belum ada pesanan.

</div>

@endif

</div>

</div>

</div>

<div class="col-lg-4">

<div class="card border-0 shadow rounded-4">

<div class="card-header bg-white border-0 py-3">

<h5 class="fw-bold mb-0">

Produk Terlaris

</h5>

</div>

<div class="card-body">

@if($produkTerlaris->count())

@foreach($produkTerlaris as $produk)

<div class="d-flex justify-content-between align-items-center py-3 border-bottom">

<div class="d-flex align-items-center">

@if($produk->image)

<img
src="{{ asset('storage/'.$produk->image) }}"
class="rounded-3 me-3"
style="width:55px;height:55px;object-fit:cover;">

@else

<div
class="bg-light rounded-3 me-3 d-flex justify-content-center align-items-center"
style="width:55px;height:55px;">

<i class="bi bi-image text-secondary"></i>

</div>

@endif

<div>

<div class="fw-semibold">

{{ $produk->name }}

</div>

<small class="text-secondary">

Stok : {{ $produk->stock }}

</small>

</div>

</div>

<div class="text-end">

<h5 class="fw-bold text-primary mb-0">

{{ $produk->total_terjual ?? 0 }}

</h5>

<small class="text-secondary">

Terjual

</small>

</div>

</div>

@endforeach

@else

<div class="alert alert-light mb-0">

Belum ada data penjualan.

</div>

@endif

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx=document.getElementById('salesChart');

new Chart(ctx,{

type:'line',

data:{

labels:[

'Jan',

'Feb',

'Mar',

'Apr',

'Mei',

'Jun',

'Jul',

'Agu',

'Sep',

'Okt',

'Nov',

'Des'

],

datasets:[{

label:'Pendapatan',

data:@json($salesChart),

borderColor:'#2563eb',

backgroundColor:'rgba(37,99,235,.15)',

fill:true,

tension:.4,

borderWidth:3,

pointRadius:4,

pointHoverRadius:7

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

plugins:{

legend:{

display:false

}

},

scales:{

y:{

beginAtZero:true,

ticks:{

callback:function(value){

return 'Rp '+value.toLocaleString('id-ID');

}

}

}

}

}

});

</script>

<style>

.card{

transition:.3s;

}

.card:hover{

transform:translateY(-5px);

box-shadow:0 20px 40px rgba(37,99,235,.12)!important;

}

.table td{

vertical-align:middle;

}

.table tbody tr:hover{

background:#f8fbff;

}

.table thead th{

font-weight:600;

color:#64748b;

}

.card-header{

background:#fff!important;

}

canvas{

max-height:350px;

}

.badge{

font-size:.8rem;

padding:8px 14px;

border-radius:30px;

}

</style>

@endsection