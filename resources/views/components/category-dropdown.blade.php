<div class="d-flex justify-content-end mt-5">
    <div class="dropdown">
        <button class="btn btn-lg btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{isset($currentCategory) ? $currentCategory->name : "Search By Category" }}
        </button>
        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="/shop">All</a></li>
            @foreach ($categories as $category)
            <li><a class="dropdown-item" href="/shop?category={{$category->name}} {{ request('search')? "&search=" .request('search') :'' }} ">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>