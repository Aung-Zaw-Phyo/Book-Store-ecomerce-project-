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
        <h2 class="text-center">Pending Orders</h2>
        <div class="row mt-3">
            @if ($pendingOrders->count())
            @foreach ($pendingOrders as $order)
            <div class="col-md-4 py-2 px-2">
                <div class="card p-2 bg-light">
                    <ul class="list-unstyled">
                        <li class="normal-fs my-3">Placed on : <span class="text-primary"> {{$order->created_at->diffForHumans()}} </span></li>
                        <li class="normal-fs my-3">Name : <span class="text-primary"> {{$order->name}} </span></li>
                        <li class="normal-fs my-3">Number : <span class="text-primary"> {{$order->number}} </span></li>
                        <li class="normal-fs my-3">Email : <span class="text-primary"> {{$order->email}} </span></li>
                        <li class="normal-fs my-3">Address : <span class="text-primary"> {{$order->address}}  in  {{$order->city}} </span></li>
                        <li class="normal-fs my-3">Payment method : <span class="text-primary"> {{$order->payment}} </span></li>
                        <li class="normal-fs my-3">Your orders : <span class="text-primary"> {{$order->books}} </span></li>
                        <li class="normal-fs my-3">Total price : <span class="text-primary"> {{$order->totalPrice}} </span></li>
                        <li class="normal-fs d-flex flex-wrap row g-2">
                            <div class="col-sm-6 text-center text-sm-end">Payment status :</div> 
                            <div class="col-sm-6 d-flex justify-content-center justify-content-sm-start">
                                <form action="/admin/order/update/{{$order->id}}" method="POST" class=" w-75 input-group">
                                    @csrf
                                    <select name="action" class="border py-1 px-2 form-control form-control-sm">
                                        <option value="{{$order->action}}" selected> {{$order->action}} </option>
                                        <option value="completed"> completed </option>
                                    </select>
                                    <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                </form>
                            </div>
                        </li>
                        <li class="my-3 mt-4">
                            <form action="/admin/pending_order/delete/{{$order->id}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 my-3 text-center">
                <div class="alert alert-warning text-center py-3 m-0"> There is no pending orders . </div>
            </div>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-3 ">
            {{$pendingOrders->links()}}
        </div>
    </div>
</x-adminLayout>