<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="container">
                <strong>{{session('info')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container py-5 p-0 text-center">
        <h2 class="text-center">Reviews</h2>
        <div class="row g-3 mt-3">
            @if ($reviews->count())
            @foreach ($reviews as $review)
            <div class="col-md-4">
                <div class="card p-2 ps-3 text-start">
                    <div class="mb-2">
                        User id : <span class="normal-fs ms-3 text-primary"> {{$review->user->id}} </span>
                    </div>
                    <div class="mb-2">
                        User name : <span class="normal-fs ms-3 text-primary"> {{$review->user->name}} </span>
                    </div>
                    <div class="mb-2">
                        User email : <span class="normal-fs ms-3 text-primary"> {{$review->user->email}} </span>
                    </div>
                    <div class="mb-2">
                        User review : <span class="normal-fs ms-3 text-primary"> {{$review->body}} </span>
                    </div>
                    <div class="mb-2">
                        Date time : <span class="normal-fs ms-3 text-primary"> {{$review->created_at->diffForHumans()}} </span>
                    </div>
                    <div class="mb-2 mt-2">
                        <form action="/admin/review/delete/{{$review->id}}" method="POST"> 
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger">Delete review</button> 
                        </form>
                    </div>        
                </div>
            </div>
            @endforeach  
            @else
            <div class="col-12 my-3 text-center">
                <div class="alert alert-warning text-center py-3 m-0"> There is no reviews . </div>
            </div>  
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">{{$reviews->links()}}</div>
    </div>
</x-adminLayout>