<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login | Marketplace</title>

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

overflow:hidden;

}

.wrapper{

min-height:100vh;

display:flex;

align-items:center;

justify-content:center;

padding:40px;

}

.login-card{

width:1150px;

min-height:680px;

background:white;

border-radius:30px;

overflow:hidden;

box-shadow:0 30px 70px rgba(37,99,235,.15);

display:flex;

}

.left{

width:50%;

padding:70px;

display:flex;

flex-direction:column;

justify-content:center;

background:white;

}

.right{

width:50%;

background:linear-gradient(135deg,#2563eb,#3b82f6);

position:relative;

display:flex;

align-items:center;

justify-content:center;

overflow:hidden;

}

.right::before{

content:"";

position:absolute;

width:520px;

height:520px;

border-radius:50%;

background:rgba(255,255,255,.08);

top:-170px;

right:-120px;

}

.right::after{

content:"";

position:absolute;

width:380px;

height:380px;

border-radius:50%;

background:rgba(255,255,255,.08);

bottom:-130px;

left:-120px;

}

.logo{

font-size:34px;

font-weight:800;

color:#2563eb;

margin-bottom:15px;

}

.logo span{

color:#111827;

}

.title{

font-size:40px;

font-weight:700;

color:#0f172a;

margin-bottom:10px;

}

.subtitle{

color:#64748b;

margin-bottom:45px;

line-height:1.8;

}

.form-label{

font-weight:600;

color:#334155;

margin-bottom:8px;

}

.form-control{

height:56px;

border-radius:15px;

border:1px solid #dbeafe;

padding-left:18px;

font-size:15px;

transition:.3s;

}

.form-control:focus{

border-color:#2563eb;

box-shadow:0 0 0 .2rem rgba(37,99,235,.15);

}

.input-group-text{

border-radius:15px;

border-left:none;

background:white;

cursor:pointer;

}

.form-control{

border-right:none;

}

.btn-login{

height:56px;

border:none;

border-radius:16px;

background:#2563eb;

color:white;

font-weight:600;

font-size:16px;

transition:.3s;

width:100%;

}

.btn-login:hover{

background:#1d4ed8;

transform:translateY(-2px);

}

.back-home{

text-decoration:none;

color:#2563eb;

font-weight:600;

}

.back-home:hover{

color:#1d4ed8;

}

.register-link{

text-decoration:none;

font-weight:600;

color:#2563eb;

}

.register-link:hover{

color:#1d4ed8;

}

.remember{

display:flex;

justify-content:space-between;

align-items:center;

margin:25px 0;

font-size:14px;

}

.illustration{

position:relative;

z-index:2;

text-align:center;

color:white;

padding:50px;

}

.illustration i{

font-size:110px;

margin-bottom:30px;

}

.illustration h2{

font-weight:700;

font-size:36px;

margin-bottom:18px;

}

.illustration p{

font-size:17px;

line-height:1.8;

opacity:.9;

}

@media(max-width:992px){

.right{

display:none;

}

.left{

width:100%;

padding:40px;

}

.login-card{

width:100%;

}

.title{

font-size:32px;

}

}

</style>

</head>

<body>

<div class="wrapper">

<div class="login-card">

<div class="left">

<a href="/" class="back-home">

<i class=""></i>

Kembali ke Beranda

</a>

<br>
<br>
<p class="subtitle">

Silahkan masuk ke akun Anda 
</p>

@if(session('status'))

<div class="alert alert-success rounded-4">

{{ session('status') }}

</div>

@endif

<form method="POST" action="{{ route('login') }}">

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

<div class="text-danger mt-2 small">

{{ $message }}

</div>

@enderror

</div>

<div class="mb-3">

<label class="form-label">

Password

</label>

<div class="input-group">

<input

type="password"

id="password"

name="password"

class="form-control @error('password') is-invalid @enderror"

placeholder="Masukkan password"

required>

<span

class="input-group-text"

onclick="togglePassword()">

<i

class="bi bi-eye"

id="eyeIcon">

</i>

</span>

</div>

@error('password')

<div class="text-danger mt-2 small">

{{ $message }}

</div>

@enderror

</div>

<div class="remember">

<div class="form-check">

<input

class="form-check-input"

type="checkbox"

name="remember"

id="remember">

<label

class="form-check-label"

for="remember">

Remember Me

</label>

</div>

@if(Route::has('password.request'))

<a

href="{{ route('password.request') }}"

class="register-link">

Lupa Password?

</a>

@endif

</div>

<button

type="submit"

class="btn-login">


Masuk

</button>

<div class="text-center mt-4">

Belum punya akun?

<a

href="{{ route('register.choice') }}"

class="register-link">

Daftar Sekarang

</a>

</div>

</form>

</div>

<div class="right">

<div class="illustration">



<h2>

COD

</h2>

<p>

platform yang lahir dari keinginan untuk menciptakan pengalaman berbelanja yang lebih cepat, lebih mudah, dan lebih menguntungkan. Kami mempertemukan pembeli dan penjual dalam satu platform yang mengutamakan transparansi, kenyamanan, serta pilihan terbaik di setiap transaksi.

</p>

<div class="mt-5">

<div class="row text-center">

<div class="col">

</div>

</div>

</div>

</div>

</div>
</div>

</div>

<script>

function togglePassword(){

    const password = document.getElementById('password');

    const eye = document.getElementById('eyeIcon');

    if(password.type === 'password'){

        password.type = 'text';

        eye.classList.remove('bi-eye');

        eye.classList.add('bi-eye-slash');

    }else{

        password.type = 'password';

        eye.classList.remove('bi-eye-slash');

        eye.classList.add('bi-eye');

    }

}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>