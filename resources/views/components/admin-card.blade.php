<div class="col-md-3 p-3">
    <div class="card p-2 cardCon shadow text-center">
        <div class="px-3"><img src="/storage/{{$book->thumbnail}}" class="my-3 bookImg img-thumbnail" style="height: 250px;" alt=""></div>
        <div class="normal-fs "> {{$book->name}} </div>
        <div class=" ">Author - {{$book->author}}</div>
        <div class="my-1 text-secondary">Category - {{$book->category->name}}</div>
        <div class="mb-1 price bg-danger text-light py-1 px-2"> ${{$book->price}} </div>
        <div class=" ">Posted Date - {{$book->created_at->diffForHumans()}} </div>
        <div class="d-flex mt-2 justify-content-center flex-wrap">
            <a href="/admin/cart/edit/{{$book->id}}" class="btn btn-warning m-1">Edit</a>
            <form action="/admin/cart/delete/{{$book->id}}" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-danger m-1" type="submit">Delete</button>
            </form>
        </div>
    </div>
</div>