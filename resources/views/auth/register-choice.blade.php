<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pilih Jenis Akun</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>

*{

margin:0;

padding:0;

box-sizing:border-box;

font-family:'Poppins',sans-serif;

}

body{

background:linear-gradient(135deg,#eff6ff,#dbeafe,#ffffff);

min-height:100vh;

display:flex;

align-items:center;

justify-content:center;

padding:30px;

overflow-x:hidden;

}

.container-box{

max-width:1100px;

width:100%;

}

.title{

font-size:42px;

font-weight:700;

color:#0f172a;

text-align:center;

}

.subtitle{

text-align:center;

color:#64748b;

margin-top:12px;

margin-bottom:55px;

}

.role-card{

background:white;

border-radius:30px;

padding:45px;

text-align:center;

box-shadow:0 20px 60px rgba(37,99,235,.12);

transition:.35s;

height:100%;

border:2px solid transparent;

}

.role-card:hover{

transform:translateY(-12px);

border-color:#2563eb;

}

.icon{

width:95px;

height:95px;

border-radius:50%;

background:#eff6ff;

display:flex;

align-items:center;

justify-content:center;

margin:auto;

margin-bottom:25px;

font-size:42px;

color:#2563eb;

}

.role-card h3{

font-weight:700;

margin-bottom:15px;

}

.role-card p{

color:#64748b;

line-height:1.8;

min-height:55px;

}

.btn-role{

width:100%;

height:55px;

border-radius:16px;

background:#2563eb;

color:white;

font-weight:600;

border:none;

transition:.3s;

text-decoration:none;

display:flex;

align-items:center;

justify-content:center;

}

.btn-role:hover{

background:#1d4ed8;

color:white;

transform:translateY(-2px);

}

.back-login{

display:inline-block;

margin-top:45px;

font-weight:600;

text-decoration:none;

color:#2563eb;

}

.back-login:hover{

color:#1d4ed8;

}

@media(max-width:768px){

.title{

font-size:32px;

}

.role-card{

margin-bottom:25px;

}

}

</style>

</head>

<body>

<div class="container-box">

<div class="text-center mb-5">

<h1 class="title">

Pilih Jenis Akun

</h1>

<p class="subtitle">

Silakan pilih peran yang sesuai sebelum membuat akun Marketplace.

</p>

</div>

<div class="row g-4">

<div class="col-lg-6">

<div class="role-card">

<div class="icon">

<i class="bi bi-bag-check-fill"></i>

</div>

<h3>

Pembeli

</h3>

<p>

Temukan berbagai produk, masukkan ke keranjang, lakukan checkout, dan pantau status pesanan dengan mudah.

</p>

<a

href="{{ route('register',['role'=>'buyer']) }}"

class="btn-role">

Daftar Sebagai Pembeli

</a>

</div>

</div>

<div class="col-lg-6">

<div class="role-card">

<div class="icon">

<i class="bi bi-shop"></i>

</div>

<h3>

Penjual

</h3>

<p>

Kelola toko, tambah produk, pantau pesanan pelanggan, dan kembangkan penjualan melalui dashboard seller.

</p>

<a

href="{{ route('register',['role'=>'seller']) }}"

class="btn-role">

Daftar Sebagai Penjual

</a>

</div>

</div>

</div>

<div class="text-center">

<a

href="{{ route('login') }}"

class="back-login">


Sudah punya akun? Login

</a>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>