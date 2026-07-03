<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Marketplace</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body>

<div class="container-fluid">

<div class="row">

<div class="col-md-2 bg-dark text-white sidebar">

<h3 class="text-center mt-3">
Marketplace
</h3>

<hr>

<a href="{{ route('admin.dashboard') }}" class="btn btn-dark w-100 text-start mb-2">
<i class="bi bi-speedometer2"></i>
Dashboard
</a>

<a href="{{ route('admin.categories.index') }}" class="btn btn-dark w-100 text-start mb-2">
<i class="bi bi-grid"></i>
Kategori
</a>

<a href="#" class="btn btn-dark w-100 text-start mb-2">
<i class="bi bi-box"></i>
Produk
</a>

<a href="#" class="btn btn-dark w-100 text-start mb-2">
<i class="bi bi-people"></i>
User
</a>

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-danger w-100 mt-3">

Logout

</button>

</form>

</div>

<div class="col-md-10">

<nav class="navbar bg-white shadow-sm">

<div class="container-fluid">

<h4 class="m-2">

Admin Dashboard

</h4>

</div>

</nav>

<div class="p-4">

@yield('content')

</div>

</div>

</div>

</div>

</body>

</html>