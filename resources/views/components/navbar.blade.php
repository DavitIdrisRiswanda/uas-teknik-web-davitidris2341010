<nav class="navbar navbar-expand-lg bg-white shadow-sm">

<div class="container-fluid">

<h4 class="mb-0">

Cash Or Duel

</h4>

<div>

<span class="me-3">

Halo,

<b>{{ auth()->user()->name }}</b>

</span>

<form action="{{ route('logout') }}"
method="POST"
class="d-inline">

@csrf

<button class="btn btn-danger btn-sm">

Logout

</button>

</form>

</div>

</div>

</nav>