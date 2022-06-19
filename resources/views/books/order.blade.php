
<x-layout>
    <x-info />

    <div class="heroBacAbout">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <h1>Your Orders</h1>
        </div>
    </div>
    <div>
        <div class="container py-5">
            <div class="row">
                <h2 class="text-center mb-4">Placed Orders</h2>
                @if ($orders->count())
                @foreach ($orders as $order)
                <div class="col-md-6 p-4 mx-auto">
                    <div class="card p-3 ps-5 bg-light">
                        <ul class="list-unstyled">
                            <li class="normal-fs my-3">Placed on : <span class="text-primary"> {{$order->created_at->diffForHumans()}} </span></li>
                            <li class="normal-fs my-3">Name : <span class="text-primary"> {{$order->name}} </span></li>
                            <li class="normal-fs my-3">Number : <span class="text-primary"> {{$order->number}} </span></li>
                            <li class="normal-fs my-3">Email : <span class="text-primary"> {{$order->email}} </span></li>
                            <li class="normal-fs my-3">Address : <span class="text-primary"> {{$order->address}}  in  {{$order->city}} </span></li>
                            <li class="normal-fs my-3">Payment method : <span class="text-primary"> {{$order->payment}} </span></li>
                            <li class="normal-fs my-3">Your orders : <span class="text-primary"> {{$order->books}} </span></li>
                            <li class="normal-fs my-3">Total price : <span class="text-primary"> {{$order->totalPrice}} </span></li>
                            <li class="normal-fs my-3">Payment status : <span class="text-primary"> {{$order->action}} </span></li>
                        </ul>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 my-3 text-center">
                    <div class="alert alert-warning text-center py-3 m-0"> There is no  orders . </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>