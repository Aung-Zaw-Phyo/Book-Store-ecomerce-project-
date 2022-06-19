<div class="" style="background-color:rgb(241, 239, 239);">
    <div class="container py-1 d-flex justify-content-between" style=" z-index: 1000;">
        <div class="">
            <a class=" fw-bold fst-italic ms-2" href="/"> 
                <span class="h6">Home</span>
            </a>
        </div>
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
</div>