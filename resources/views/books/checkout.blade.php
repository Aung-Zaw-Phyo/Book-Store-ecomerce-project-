
<x-layout>
    <x-info />

    <div class="heroBacAbout">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <h1>Checkout</h1>
        </div>
    </div>
    <div>
        <div class="container mt-3">
            <div class="row g-1 d-flex justify-content-center">
                <div hidden>
                    {{$totalPrice = 0}}
                    {{$books = ''}}
                </div>
                @foreach ($carts as $cart)
                <div class="col-md-3 p-3">
                    <div class="card shadow py-3 px-1 text-center">
                        <div class="normal-fs">
                            {{$cart->book->name}} 
                            <span class="text-danger">(${{$cart->book->price}} /- × {{$cart->total}})</span>
                        </div>
                    </div>
                </div>
                <div hidden>
                    {{$totalPrice += $cart->book->price * $cart->total}}
                    {{$books .= $cart->book->name . '('.$cart->total.')' .','.' '}}
                </div>
                @endforeach
                
            </div>
            <div class="my-3 text-center">
                <h4 class="text-center">
                    <span class="text-secondary">Grand total</span>
                    :
                    <span class="text-danger">${{$totalPrice}}/-</span>
                </h4>
                <x-error name='books' />
            </div>
        </div>

        <div class="container my-5">
            <div class="card p-3 bg-light">
                <h2 class="text-center mb-4">Place Your Order</h2>
                <form action="/checkout" method="POST">
                    @csrf
                    <input type="hidden" name="books" value="{{$books}}">
                    <input type="hidden" name="totalPrice" value="{{$totalPrice}}">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" 
                                    name="name" 
                                    value="{{old('name')}}"
                                    class="form-control" id="name" 
                                    placeholder="Enter your name"  required />
                                <x-error name='name' />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email"
                                    name="email" 
                                    value="{{old('email')}}"
                                    class="form-control" id="email" 
                                    placeholder="Enter your email"   required />
                                    <x-error name='email'/>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Your Number</label>
                                <input type="number"
                                    name="number" 
                                    value="{{old('number')}}"
                                    class="form-control" id="number" 
                                    placeholder="Enter your number"   required >
                                    <x-error name='number'/>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text"
                                    name="address" 
                                    value="{{old('address')}}"
                                    class="form-control" id="address" 
                                    placeholder="Enter your address" required >
                                    <x-error name='address' />
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="city"
                                    name="city" 
                                    value="{{old('city')}}"
                                    class="form-control" id="city" 
                                    placeholder="Enter your city"  required >
                                    <x-error name='city'/>
                            </div>
                            <div class="mb-3">
                                <label for="payment" class="form-label">Payment Method</label>
                                <select class="form-control" name="payment" id="payment"  required >
                                    <option value="cash on delivery" selected>cash on delivery</option>
                                    <option value="paypal">paypal</option>
                                    <option value="credit card">credit card</option>
                                </select>
                                <x-error name='payment'/>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-lg btn-primary mt-3">Order Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>