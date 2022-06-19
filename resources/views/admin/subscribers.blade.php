<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning text-center py-3 m-0"> {{session('info')}} </div>
    @endif
    <div class="container py-5 p-0">
        <h2 class="text-center">Subscribers</h2>
        <div class="row mt-4">
            @if ($subscribers->count())
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
                                <th scope="col">Subscribed Time</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                <tr>
                                    <th> {{$subscriber->user->id}} </th>
                                    <td> {{$subscriber->user->name}} </td>
                                    <td> {{$subscriber->user->username}} </td>
                                    <td> {{$subscriber->user->email}} </td>
                                    <td> {{$subscriber->created_at->diffForHumans()}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
            @else
            <div class="col-12 my-3 text-center">
                <div class="alert alert-warning text-center py-3 m-0"> There is no subscriber . </div>
            </div>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-3 ">
            {{$subscribers->links()}}
        </div>
    </div>
</x-adminLayout>