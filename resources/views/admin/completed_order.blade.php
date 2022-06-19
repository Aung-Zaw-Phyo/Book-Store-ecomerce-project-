<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning text-center py-3 m-0"> {{session('info')}} </div>
    @endif
    <div class="container py-5 p-0 text-center">
        <h2 class="text-center">Completed Orders</h2>
        <div class="row mt-3">
            @if ($completedOrders->count())
            @foreach ($completedOrders as $order)
            <div class="col-md-4 py-2 px-2">
                <div class="card p-3 bg-light">
                    <ul class="list-unstyled text-start">
                        <li class="normal-fs my-2">Placed on : <span class="text-primary"> {{$order->created_at->diffForHumans()}} </span></li>
                        <li class="normal-fs my-2">Name : <span class="text-primary"> {{$order->name}} </span></li>
                        <li class="normal-fs my-2">Number : <span class="text-primary"> {{$order->number}} </span></li>
                        <li class="normal-fs my-2">Email : <span class="text-primary"> {{$order->email}} </span></li>
                        <li class="normal-fs my-2">Address : <span class="text-primary"> {{$order->address}}  in  {{$order->city}} </span></li>
                        <li class="normal-fs my-2">Payment method : <span class="text-primary"> {{$order->payment}} </span></li>
                        <li class="normal-fs my-2">Your orders : <span class="text-primary"> {{$order->books}} </span></li>
                        <li class="normal-fs my-2">Total price : <span class="text-primary"> {{$order->totalPrice}} </span></li>
                        <li class="normal-fs my-2">Payment status : <span class="text-primary"> {{$order->action}} </span></li>
                        <li class="normal-fs my-2">
                            <form action="/admin/completed_order_delete/{{$order->id}}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 my-3 text-center">
                <div class="alert alert-warning text-center py-3 m-0"> There is no completed orders . </div>
            </div> 
            @endif
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{$completedOrders->links()}}
        </div>
    </div>
</x-adminLayout>