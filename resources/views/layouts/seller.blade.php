<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title','Seller Dashboard')</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

*{

margin:0;

padding:0;

box-sizing:border-box;

font-family:'Poppins',sans-serif;

}

body{

background:#f4f8ff;

overflow-x:hidden;

}

.layout{

display:grid;

grid-template-columns:280px 1fr;

min-height:100vh;

}

.sidebar{

background:transparent;

}

.main{

display:flex;

flex-direction:column;

min-width:0;

}

.topbar{

height:72px;

background:#fff;

display:flex;

align-items:center;

justify-content:space-between;

padding:0 30px;

box-shadow:0 5px 20px rgba(0,0,0,.05);

position:sticky;

top:0;

z-index:1000;

}

.logo{

font-size:30px;

font-weight:700;

color:#2563eb;

}

.logo span{

color:#111827;

}

.page{

padding:30px;

flex:1;

}

.user-info{

display:flex;

align-items:center;

gap:15px;

}

.avatar{

width:45px;

height:45px;

border-radius:50%;

background:#2563eb;

display:flex;

align-items:center;

justify-content:center;

color:#fff;

font-size:22px;

}

.btn-logout{

border-radius:30px;

padding:8px 20px;

}

@media(max-width:992px){

.layout{

grid-template-columns:1fr;

}

.page{

padding:20px;

}

.topbar{

padding:0 20px;

}

}

</style>

</head>

<body>

<div class="layout">

<aside class="sidebar">

@include('components.sidebar-seller')

</aside>

<div class="main">

<header class="topbar">

<div class="logo">

Cash <span>Or Duel</span>

</div>

<div class="user-info">

<div class="text-end">

<small class="text-secondary d-block">

Seller

</small>

<strong>

{{ auth()->user()->name }}

</strong>

</div>

<div class="avatar">

<i class="bi bi-person-fill"></i>

</div>

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-outline-danger btn-logout">


Logout

</button>

</form>

</div>

</header>

<div class="page">

@yield('content')

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>