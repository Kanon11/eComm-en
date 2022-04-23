@php
use App\Http\Controllers\ProductController;
if (Session::has('user')) {
    $t_c = ProductController::usercartCount();
} else {
    $t_c = 0;
}

@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">eComm-en</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/order-list">Orders</a>
            </li>
            <form class="form-inline my-2 my-lg-0" action="/search">
                <input class="form-control mr-sm-2 search-box" type="search" name="query" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </ul>
        <ul class="form-inline my-2 my-lg-0">
            <a class="nav-link" href="/cart-list">Chart({{ $t_c }})</a>
        </ul>
        @if (Session::has('user'))
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Session::get('user')['name'] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Log Out</a>
                    </div>
                </li>
            </ul>
        @else
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Not Loged In
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/login">Log In</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/register">Registration</a>
                </li>
            </ul>
        @endif


</nav>
