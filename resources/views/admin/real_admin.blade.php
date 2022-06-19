<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning text-center py-3 m-0"> {{session('info')}} </div>
    @endif
    <div class="container py-5 p-0 ">
        <div class="d-flex">
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-users fs-5"></i>         
            </button>
            <div class="dropdown-menu p-2 ps-3 mt-2 shadow text-primary">
                <div> All user : {{$users->count()}}</div>
                <div class="my-1"> Admin : {{$admins->count()}} </div> 
                <div> Client : {{$clients->count()}} </div> 
            </div>
            <button class="btn btn-outline-primary mx-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user-large fs-5"></i>         
            </button>
            <div class="dropdown-menu p-2 ps-3 mt-2 shadow text-primary">
                @foreach ($admins as $admin)
                    @if ($admin->email === 'julian@gmail.com'and $admin->username==='julian')
                    <div class="mb-2"> Id : {{$admin->id}} </div>
                    <div class="mb-2"> Username : {{$admin->username}} </div>
                    <div class="mb-2"> Email : {{$admin->email}} </div>
                    <div class="mb-2"> Type : Real Admin </div>
                    <div class="mt-2"><a href="/admin/posts/{{$admin->id}}" class="btn btn-sm btn-primary">Posted Lists</a></div>
                    @endif
                @endforeach
            </div>
            <div class="">
                <button class="fs-5 btn btn-outline-primary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#exampleModal">
                        <i class="fa-solid fa-magnifying-glass"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search User</h5>
                        </div>
                        <div class="modal-body py-3">
                            <form action="/admin/real_admin"  class="input-group">
                                <input type="text"
                                    name="username" class="form-control" value="{{request('username')}}"
                                    placeholder="Enter username">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-2 mt-5">
            @foreach ($admins as $admin)
                @unless ($admin->email==='julian@gmail.com' and $admin->username==='julian')
                <div class="col-md-4 p-2">
                    <div class="card p-3 ps-4 bg-light text-start">
                        <div class="mb-2"> Id : {{$admin->id}} </div>
                        <div class="mb-2"> Name : {{$admin->name}} </div>
                        <div class="mb-2"> Username : {{$admin->username}} </div>
                        <div class="mb-2"> Email : {{$admin->email}} </div>
                        <div class="mb-2"> Type : Normal Admin </div>
                        <div class="my-2"><a href="/admin/posts/{{$admin->id}}" class="btn  btn-primary">Posted Lists</a></div>
                        <div class="d-flex flex-wrap">
                            <form action="/admin/permit/{{$admin->id}}" method="POST">
                                @csrf
                                <button class="btn btn-warning  my-2 me-3" type="submit">Not Admin</button>
                            </form>
                            <form action="/admin/delete/{{$admin->id}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger  my-2" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endunless
            @endforeach
        </div>

        @if ($searchUsers && $searchUsers->count())
        <x-is_admin :searchUsers="$searchUsers" />
        @endif

    </div>
</x-adminLayout>