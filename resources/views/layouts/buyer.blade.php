<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('title','Marketplace')</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
}

body{
background:#f5f7fb;
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

height:70px;
background:#fff;
padding:0 30px;
display:flex;
justify-content:space-between;
align-items:center;
box-shadow:0 2px 15px rgba(0,0,0,.05);

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

@media(max-width:992px){

.layout{

grid-template-columns:1fr;

}

.sidebar{

position:relative;

}

.topbar{

padding:0 20px;

}

.page{

padding:20px;

}

}

</style>

</head>

<body>

<div class="layout">

<aside class="sidebar">

@include('components.sidebar-buyer')

</aside>

<div class="main">

<header class="topbar">

<div class="logo">

CashOr<span>Duel</span>

</div>

<div class="d-flex align-items-center">

<span class="me-4">

Halo,

<strong>{{ auth()->user()->name }}</strong>

</span>

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-danger rounded-pill px-4">

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