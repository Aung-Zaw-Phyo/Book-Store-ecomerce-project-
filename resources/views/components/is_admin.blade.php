@props(['searchUsers'])
<div>
    <div class="w-100 mx-auto bg-danger my-5" style="height: 1px"></div>
    <div class="row g-2">
        <h3 class="text-center mb-3">Searched Users</h3>
        @foreach ($searchUsers as $searchUser)
            <div class="col-md-4 p-2">
                <div class="card p-3 ps-4 bg-light text-start">
                    <div class="mb-2"> Id : {{$searchUser->id}} </div>
                    <div class="mb-2"> Name : {{$searchUser->name}} </div>
                    <div class="mb-2"> Username : {{$searchUser->username}} </div>
                    <div class="mb-2"> Email : {{$searchUser->email}} </div>
                    <div class="mb-2"> Type : User </div>
                    <div class="d-flex flex-wrap">
                        <form action="/admin/permit/{{$searchUser->id}}" method="POST">
                            @csrf
                            <button class="btn btn-warning  my-2 me-3" type="submit">Is Admin</button>
                        </form>
                        <form action="/admin/user/delete/{{$searchUser->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger  my-2" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>