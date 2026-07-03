<div class="d-flex flex-column h-100 text-white p-4"
style="background:linear-gradient(180deg,#2563eb,#1d4ed8);height:100%;">

    <div class="text-center mb-5">

   

    <hr class="border-light opacity-25">

    <ul class="nav nav-pills flex-column gap-2">

        <li class="nav-item">

            <a
                href="{{ route('seller.dashboard') }}"
                class="nav-link sidebar-link {{ request()->routeIs('seller.dashboard') ? 'active' : '' }}">

                <i class="bi bi-speedometer2"></i>

                <span>Dashboard</span>

            </a>

        </li>

        <li class="nav-item">

            <a
                href="{{ route('seller.products.index') }}"
                class="nav-link sidebar-link {{ request()->routeIs('seller.products.*') ? 'active' : '' }}">

                <i class="bi bi-box-seam"></i>

                <span>Produk Saya</span>

            </a>

        </li>

        <li class="nav-item">

            <a
                href="{{ route('seller.orders') }}"
                class="nav-link sidebar-link {{ request()->routeIs('seller.orders*') ? 'active' : '' }}">

                <i class="bi bi-receipt"></i>

                <span>Pesanan Masuk</span>

            </a>

        </li>

        <li class="nav-item">

            <a
                href="{{ route('seller.profile') }}"
                class="nav-link sidebar-link {{ request()->routeIs('seller.profile') ? 'active' : '' }}">

                <i class="bi bi-person-circle"></i>

                <span>Profil</span>

            </a>

        </li>

    </ul>

    <div class="mt-auto">

        <hr class="border-light opacity-25">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

    

        </form>

    </div>

</div>

<style>

.sidebar-link{

display:flex;

align-items:center;

gap:15px;

padding:14px 18px;

border-radius:14px;

color:#fff;

text-decoration:none;

font-weight:500;

transition:.3s;

}

.sidebar-link i{

font-size:20px;

width:24px;

text-align:center;

}

.sidebar-link:hover{

background:rgba(255,255,255,.15);

color:#fff;

transform:translateX(5px);

}

.sidebar-link.active{

background:#fff !important;

color:#2563eb !important;

font-weight:700;

box-shadow:0 10px 25px rgba(0,0,0,.15);

}

</style>