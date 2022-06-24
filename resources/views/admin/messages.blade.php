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
        <h2 class="text-center">Messages</h2>
        <div class="row g-3 mt-3">
            @if ($messages->count())
            @foreach ($messages as $message)
            <div class="col-md-4">
                <div class="card p-2 ps-3 text-start">
                    <div class="mb-2">
                        User id : <span class="normal-fs ms-3 text-primary"> {{$message->id}} </span>
                    </div>
                    <div class="mb-2">
                        User name : <span class="normal-fs ms-3 text-primary"> {{$message->name}} </span>
                    </div>
                    <div class="mb-2">
                        User number : <span class="normal-fs ms-3 text-primary"> {{$message->number}} </span>
                    </div>
                    <div class="mb-2">
                        User email : <span class="normal-fs ms-3 text-primary"> {{$message->email}} </span>
                    </div>
                    <div class="mb-2">
                        User message : <span class="normal-fs ms-3 text-primary"> {{$message->message}} </span>
                    </div>
                    <div class="mb-2">
                        Date time : <span class="normal-fs ms-3 text-primary"> {{$message->created_at->diffForHumans()}} </span>
                    </div>
                    <div class="mb-2 mt-2">
                        <form action="/admin/message/delete/{{$message->id}}" method="POST">
                            @method('delete')
                            @csrf 
                            <button class="btn btn-sm btn-danger">Delete Message</button> 
                        </form>
                    </div>        
                </div>
            </div>
            @endforeach 
            @else
            <div class="col-12 my-3 text-center">
                <div class="alert alert-warning text-center py-3 m-0"> There is no messages . </div>
            </div>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">{{$messages->links()}}</div>
    </div>
</x-adminLayout>