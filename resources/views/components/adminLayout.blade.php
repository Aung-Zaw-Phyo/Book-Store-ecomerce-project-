<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7c0ec42130.js" crossorigin="anonymous"></script>
    <title>Book Store</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <x-admin-navbar/>

    <div>
        <div class="container-fluid py-1">
            <div class="row">
                <div class="col-2 " style="position: relative;">
                    <div class="hv-100"  style="position: fixed;">
                        <div class="list-group text-center text-lg-start">
                            <span class="list-group-item">
                                <i class="fa-solid fa-bars"></i>
                                <span class="d-none d-lg-inline ms-2">ACTIONS</span>
                            </span>
                            <a href="/admin/products" class="list-group-item">
                                <i class="fa-solid fa-book"></i>
                                <span class="d-none d-lg-inline ms-2">Books</span>
                            </a>
                            <a href="/admin/products/add" class="list-group-item">
                                <i class="fa-solid fa-book"></i>
                                <span class="d-none d-lg-inline ms-2">Create Books</span>
                            </a>
                            <a href="/admin/categories" class="list-group-item">
                                <i class="fa-solid fa-table-cells-large"></i>
                                <span class="d-none d-lg-inline ms-2">Categories</span>
                            </a>
                            <a href="/admin/categories/add" class="list-group-item">
                                <i class="fa-solid fa-table-cells-large"></i>
                                <span class="d-none d-lg-inline ms-2">Create Categories</span>
                            </a>
                            <a href="/admin/orders/pend" class="list-group-item">
                                <i class="fa-solid fa-list-check"></i>
                                <span class="d-none d-lg-inline ms-2">Pending Orders</span>
                            </a>
                            <a href="/admin/orders/complete" class="list-group-item">
                                <i class="fa-solid fa-list"></i>
                                <span class="d-none d-lg-inline ms-2">Completed Orders</span>
                            </a>
                            <a href="/admin/income" class="list-group-item">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <span class="d-none d-lg-inline ms-2">Income</span>
                            </a>
                        </div>
                        <div class="list-group mt-4 text-center text-lg-start">
                            <span class="list-group-item">
                                <i class="fa-solid fa-bars"></i>
                                <span class="d-none d-lg-inline ms-2">CONTROLS</span>
                            </span>
                            <a href="/admin/users" class="list-group-item">
                                <i class="fa-solid fa-users"></i>
                                <span class="d-none d-lg-inline ms-2">Users</span>
                            </a>
                            <a href="/admin/subscribers" class="list-group-item">
                                <i class="fa-solid fa-message"></i>
                                <span class="d-none d-lg-inline ms-2">Subscribers</span>
                            </a>
                            <a href="/admin/messages" class="list-group-item">
                                <i class="fa-solid fa-message"></i>
                                <span class="d-none d-lg-inline ms-2">Messages</span>
                            </a>
                            <a href="/admin/reviews" class="list-group-item">
                                <i class="fa-solid fa-comments"></i>
                                <span class="d-none d-lg-inline ms-2">Reviews</span>
                            </a>
                            <a href="/admin/real_admin" class="list-group-item">
                                <i class="fa-solid fa-user-lock"></i>
                                <span class="d-none d-lg-inline ms-2">Real Admin Only</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-10">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <div  style="width: 90%; height: 1px; background-color: lightgray;"></div>
    </div>
    <div class=" py-4 text-center normal-fs">&#169; copyright @ 2022 by bookstore</div>
    <script src="/js/script.js"></script>   
</body>
</html>
