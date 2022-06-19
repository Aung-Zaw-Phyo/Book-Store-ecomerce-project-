
<div class="container py-1 pt-2 d-flex justify-content-between" style="background-color: white; z-index: 1000;">
        @auth
            @can('admin')
            <a class=" fw-bold fst-italic ms-2" href="/admin"> 
                <span class="h5">Dashboard</span>
            </a>
            @else
            <div class="">
                <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-facebook-f"></i></a>
                <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-twitter"></i></a>
                <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-instagram"></i></a>
                <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-linkedin"></i></a>
            </div>  
            @endcan
        @else
        <div class="">
            <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-facebook-f"></i></a>
            <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-twitter"></i></a>
            <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-instagram"></i></a>
            <a class="text-dark fs-5 me-2" href=""><i class="fa-brands fa-linkedin"></i></a>
        </div>
        @endauth
    
    <div class="">
        @auth
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
        @else
            <a class="text-decoration-none me-1" href="/login">Login</a>
            |
            <a class="text-decoration-none ms-1" href="/register">Register</a>
        @endauth
    </div>
</div>

<div class="overlay px-4 pt-5 mt-5">
    <div class="navbar overlayChild w-100 bg-light">
        <ul class="navbar-nav px-3 w-100 px-auto  mb-2 mb-lg-0 mt-5 text-center">
            <li class="nav-item mb-2">
                <a class="nav-link active fs text-dark" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link active fs text-dark" aria-current="page" href="/shop">Shop</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link active fs text-dark" href="/about">About</a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link active fs text-dark" href="/contact">Contact</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link active fs text-dark" aria-current="page" href="/order">Orders</a>
            </li>
        </ul>
    </div>
</div>

<nav class="navUpDown navbar fixed-top navbar-expand-lg navbar-light bg-light py-2">
    <div class="container">
        <a class="navbar-brand fw-bold fst-italic" href="/home"> 
            <i class="logoImage me-1 fs-3 fa-solid fa-book"></i>
            <span class="logoText h3">Book Store</span>
        </a>

        <div class="ms-auto menuContainer d-lg-none">
            <div class="menu line1"></div>
            <div class="menu line2"></div>
            <div class="menu line3"></div>
        </div>
        <div class="ms-auto hideShow d-none d-lg-block me-2">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a class="nav-link active fs" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active fs" aria-current="page" href="/shop">Shop</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active fs" href="/about">About</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active fs" href="/contact">Contact</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link active fs" aria-current="page" href="/order">Orders</a>
                </li>
            </ul>
        </div>
        <div class="ms-2 d-flex">
            <ul class="nav">
                <li class="nav-item dropdown  px-0">
                    <a class="nav-link text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user fs-5"></i>
                    </a>
                    <ul class="dropdown-menu fixDropdown text-center" aria-labelledby="navbarDropdown">
                        @auth
                        <li>Username : <span class="text-primary">{{auth()->user()->username}}</span></li>
                        <li class="my-3">Email : <span class="text-primary"> {{auth()->user()->email}} </span></li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                            </form>
                        </li>
                        @else
                        <li class="py-3"><a href="/login">Login</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
            <x-cart-count/>
        </div>
    </div>
</nav>
