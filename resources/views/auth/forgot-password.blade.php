<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Lupa Password | Marketplace</title>

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

min-height:100vh;

background:linear-gradient(135deg,#eff6ff,#dbeafe,#ffffff);

display:flex;

align-items:center;

justify-content:center;

padding:30px;

}

.card-reset{

width:520px;

background:white;

border-radius:28px;

padding:45px;

box-shadow:0 30px 70px rgba(37,99,235,.15);

animation:fade .6s ease;

}

.logo{

font-size:32px;

font-weight:800;

color:#2563eb;

text-align:center;

margin-bottom:10px;

}

.logo span{

color:#111827;

}

h2{

text-align:center;

font-weight:700;

margin-bottom:15px;

color:#0f172a;

}

.desc{

text-align:center;

color:#64748b;

line-height:1.8;

margin-bottom:30px;

}

.form-control{

height:55px;

border-radius:15px;

border:1px solid #dbeafe;

padding-left:18px;

}

.form-control:focus{

border-color:#2563eb;

box-shadow:0 0 0 .2rem rgba(37,99,235,.15);

}

.btn-reset{

width:100%;

height:55px;

border:none;

border-radius:15px;

background:#2563eb;

color:white;

font-weight:600;

transition:.3s;

}

.btn-reset:hover{

background:#1d4ed8;

transform:translateY(-2px);

}

.back{

display:inline-block;

margin-top:25px;

text-decoration:none;

font-weight:600;

color:#2563eb;

}

.back:hover{

color:#1d4ed8;

}

@keyframes fade{

from{

opacity:0;

transform:translateY(30px);

}

to{

opacity:1;

transform:translateY(0);

}

}

</style>

</head>

<body>

<div class="card-reset">

<div class="logo">

Market<span>Place</span>

</div>

<h2>

Lupa Password?

</h2>

<p class="desc">

Masukkan alamat email yang terdaftar. Kami akan mengirimkan tautan untuk mengatur ulang password akun Anda.

</p>

@if(session('status'))

<div class="alert alert-success rounded-4">

{{ session('status') }}

</div>

@endif

<form method="POST" action="{{ route('password.email') }}">

@csrf

<div class="mb-4">

<label class="form-label">

Email

</label>

<input

type="email"

name="email"

class="form-control @error('email') is-invalid @enderror"

placeholder="Masukkan email"

value="{{ old('email') }}"

required

autofocus>

@error('email')

<div class="text-danger mt-2">

{{ $message }}

</div>

@enderror

</div>

<button

class="btn-reset"

type="submit">

<i class="bi bi-envelope-paper me-2"></i>

Kirim Link Reset Password

</button>

</form>

<div class="text-center">

<a

href="{{ route('login') }}"

class="back">

<i class="bi bi-arrow-left"></i>

Kembali ke Login

</a>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>