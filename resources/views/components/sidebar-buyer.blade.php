<div class="d-flex flex-column h-100 text-white p-4"
    style="background:linear-gradient(180deg,#2563eb,#1d4ed8);min-height:100vh;">

    <div class="text-center mb-8">

    </div>

    <hr class="border-light opacity-25">

    <ul class="nav nav-pills flex-column gap-2">

        <li class="nav-item">

            <a
                href="{{ route('buyer.dashboard') }}"
                class="nav-link sidebar-link {{ request()->routeIs('buyer.dashboard') ? 'active' : '' }}">

            </a>

        </li>

        <li class="nav-item">

            <a
                href="{{ route('buyer.marketplace') }}"
                class="nav-link sidebar-link {{ request()->routeIs('buyer.marketplace') ? 'active' : '' }}">

                <i class="bi bi-shop"></i>

                <span>Dashboard</span>

            </a>

        </li>

        <li class="nav-item">

            <a
                href="{{ route('buyer.cart') }}"
                class="nav-link sidebar-link {{ request()->routeIs('buyer.cart') ? 'active' : '' }}">

                <i class="bi bi-cart3"></i>

                <span>Keranjang</span>

            </a>

        </li>

        <li class="nav-item">

            <a
                href="{{ route('buyer.orders') }}"
                class="nav-link sidebar-link {{ request()->routeIs('buyer.orders') ? 'active' : '' }}">

                <i class="bi bi-receipt"></i>

                <span>Pesanan Saya</span>

            </a>

        </li>

        <li class="nav-item">

            <a
                href="{{ route('buyer.profile') }}"
                class="nav-link sidebar-link {{ request()->routeIs('buyer.profile') ? 'active' : '' }}">

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
    color:white;
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
    color:white;
    transform:translateX(6px);

}

.sidebar-link.active{

    background:white !important;
    color:#2563eb !important;
    font-weight:700;
    box-shadow:0 10px 25px rgba(0,0,0,.15);

}

</style>