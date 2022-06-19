
<x-layout>
    <x-info />
    
    <div class="heroBacAbout">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <h1>Shopping Cart</h1>
        </div>
    </div>

    <div>
        <div class="container py-5">
            <div class="d-flex flex-column align-items-center">
                <h2 class="">Products Added</h2>
                <div class="divider"></div>
            </div>
            <div class="row g-3 mt-3">
                <div hidden>
                    {{$totalPrice = 0}}
                </div>
                @foreach ($carts as $cart)
                <div class="col-md-4 p-3">
                    <div class="card p-2 text-center">
                        <form action="/cart/cancel/{{$cart->id}}" method="POST">
                            @csrf
                            <img src="/storage/{{$cart->book->thumbnail}}" class="my-4" style="height: 340px;" alt="">
                            <div class="fs-5 my-1 ">{{$cart->book->name}}</div>
                            <div class="normal-fs">Author - {{$cart->book->author}}</div>
                            <div class="my-1 normal-fs text-secondary">Category - {{$cart->book->category->name}}</div>
                            <div class="normal-fs">Total - {{$cart->total}}</div>
                            <div class="normal-fs">Price - {{$cart->book->price}}$ / total price - {{$cart->total*$cart->book->price}}$</div>
                            <input type="hidden" name='book_id' value="">
                            <button class="btn btn-outline-primary my-2 mt-3 w-50" type="submit">Cancel</button>
                        </form>
                    </div>
                </div>
                <div hidden>
                    {{$totalPrice += $cart->book->price * $cart->total}}
                </div>
                @endforeach
            </div>
            @if ($carts->count())
            <div class="text-center mt-5">
                <form action="/carts/cancel" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary fst-italic btn-lg" style="width: 250px;">Cancel All</button>
                </form>
            </div>
            @else
            <div class="text-center mt-5">
                <div class="alert alert-warning text-center py-3 m-0"> There is no added carts! </div>
                <a href="/shop" class="btn btn-lg btn-warning m-3">Continue Shopping</a>
            </div>
            @endif
        </div>

        @if ($carts->count())
        <div class="container">
            <div class="card text-center p-3 py-4">
                <h3>Grand Total - ${{$totalPrice}}</h3>
                <div class="mt-4">
                    <a href="/shop" class="btn btn-lg btn-warning m-2">Continue Shopping</a>
                    <a href="/checkout" class="btn btn-lg btn-secondary m-2">Proceed to checkout</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-layout>