@props(['reviews'])

<div class="container py-5 pb-3">
    <div class="d-flex flex-column align-items-center">
        <h2 class="">Client's Reviews</h2>
        <div class="divider"></div>
    </div>
    <div class="row g-3 mt-3">
        @foreach ($reviews as $review)
        <div class="col-md-4 p-3">
            <div class="card p-2 text-center ">
                <img class=" mx-auto  d-block" style="width: 130px; height: 130px; border-radius: 50%; background-color:rgb(233, 231, 231);" src="https://www.freeiconspng.com/thumbs/profile-icon-png/profile-icon-9.png" alt="">
                <div class="normal-fs mt-2 fw-bold"> {{$review->user->name}} </div>
                <div class="text-decoration"> {{$review->created_at->diffForHumans()}} </div>
                <div class="text-center normal-fs my-1">
                    {{$review->body}}
                </div>
                <div class="my-2 d-flex justify-content-center flex-wrap">
                    <a href="/books/oredered-list/{{$review->user->id}}" class="btn btn-sm m-1 btn-warning">View Client Ordered List</a>

                    @if (auth()->id() == $review->user->id)
                        <form action="/review/delete/{{$review->id}}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-warning m-1" type="submit">Delete</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center mt-3"> 
            {{$reviews->links()}}
        </div>
    </div>
</div>