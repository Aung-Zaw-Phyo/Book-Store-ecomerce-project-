<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="container">
                <strong>{{session('info')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container py-5 p-0">
        <h2 class="text-center">All Users</h2>
        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <div class="p-3 card shadow">
                    <div class="table-responsive ">
                        <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th> {{$user->id}} </th>
                                    <td> {{$user->name}} </th>
                                    <td> {{$user->username}} </td>
                                    <td> {{$user->email}} </td>
                                    @if ($user->is_admin)
                                    <td> Admin </td>
                                    @else
                                    <td> User </td>
                                    @endif
                                    @unless ($user->is_admin)
                                    <td class="text-center">
                                        <form action="/admin/user/delete/{{$user->id}}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                    @endunless
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3 ">
            {{$users->links()}}
        </div>
    </div>
</x-adminLayout>