

<x-layout>
    <x-info />
    {{-- heroSection  --}}
    <div class="heroSectionHome m-0 py-5">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6 p-3">
                    <div>
                        <h2>Discover</h2>
                        <h2 class="fst-italic" style="color:rgba(177, 106, 244, 0.8);">The Best Books </h2>
                        <h2>Of All Days</h2>
                    </div>
                    <div class="w-75 my-4 text-secondary normal-fs">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae dolorem saepe. Blanditiis cum laudantium necessitatibus iste veritatis fuga quae nihil!
                    </div>
                    <div>
                        <a href="/shop" class="btn w-50 btn-outline-primary">Shop Now</a>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="heroBacHome">
                        <div class="fs-5 text-secondary w-50">“Some books leave us free and some books make us free.”</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-3 p-2 text-center">
                    <div><i class="fa-solid fa-truck h1"></i></div>
                    <h5 class="my-2">Fast Delivery</h5>
                    <div class="normal-fs text-secondary">Lorem ipsum dolor  adipiscing elit ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                </div>
                <div class="col-md-3 p-2 text-center">
                    <div><i class="fa-solid fa-clock h1"></i></div>
                    <h5 class="my-2">Open 24 Hours</h5>
                    <div class="normal-fs text-secondary">Lorem ipsum dolor  adipiscing elit ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                </div>
                <div class="col-md-3 p-2 text-center">
                    <div><i class="fa-solid fa-credit-card h1"></i></div>
                    <h5 class="my-2">Online Payment</h5>
                    <div class="normal-fs text-secondary">Lorem ipsum dolor  adipiscing elit ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                </div>
                <div class="col-md-3 p-2 text-center">
                    <div><i class="fa-solid fa-folder h1"></i></div>
                    <h5 class="my-2">Online Order</h5>
                    <div class="normal-fs text-secondary">Lorem ipsum dolor  adipiscing elit ipsum dolor sit amet. Lorem ipsum dolor sit amet.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div  style="width: 90%; height: 1px; background-color: lightgray;"></div>
    </div>

    <div>
        <div class="container py-5">
            <div class="d-flex flex-column align-items-center">
                <h2 class="">Latest Products</h2>
                <div class="divider"></div>
            </div>
            <div class="row g-3 mt-3">
                @foreach ($books as $book)
                <x-card :book="$book"/>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="/shop#products" class="btn btn-primary fst-italic btn-lg" style="width: 250px;">See More</a>
            </div>
        </div>
    </div>

    <div class="" style="background-color: rgba(211, 211, 211, 0.179)">
        <div class="container py-5 text-center">
            <div class="d-flex flex-column align-items-center">
                <h2 class="">Subscribe for new books</h2>
                <div class="divider"></div>
            </div>
            <p class="mt-3 mb-4 normal-fs">Subscribe to receive regular updates, as
                well as news on upcoming events and special offers.
            </p>
            @auth
            <form action="/subscribe" method="POST">
                @csrf
                @if (auth()->user()->isSubscribe())
                    <button class="btn btn-danger btn-lg" type="submit">UnSubscribe</button>
                @else
                    <button class="btn btn-primary btn-lg" type="submit">Subscribe</button>
                @endif
            </form>
            @else
            <div class="text-danger "> Please Login to Subscribe! <a href="/login" class="ms-2">login</a> </div>
            @endauth
        </div>
    </div>

    <div class="">
        <div class="container py-5 my-5">
            <div class="row g-3">
                <div class="col-md-6 p-3">
                    <img class="w-100" src="/images/books/about-img.jpg" style="height: 400px" alt="">
                </div>
                <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                    <h2>About Us</h2>
                    <p class="text-secondary normal-fs my-3 mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit delectus temporibus consectetur sequi cum, hic dolorum deserunt? Sit, eaque iste aliquam voluptas doloremque ab doloribus quaerat quo unde sequi, labore perspiciatis nemo repudiandae reprehenderit ratione quibusdam! Dolore quam cumque porro asperiores, illo laboriosam ratione iusto magnam nostrum voluptates ducimus unde.</p>
                    <div class=""><a href="/about" class="btn btn-warning btn-lg fst-italic">Read More</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class=" text-light py-4" style="background-color: rgb(88, 62, 62);">
        <div class="container">
            <div class="col-md-8 mx-auto text-center">
                <h2>Have Any question</h2>
                <p class=" normal-fs my-3 mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit delectus temporibus consectetur sequi cum, hic dolorum deserunt? Sit, eaque iste aliquam voluptas doloremque ab doloribus quaerat quo unde sequi, labore perspiciatis nemo repudiandae reprehenderit ratione quibusdam! Dolore quam cumque porro asperiores, illo laboriosam .</p>
                <div class=""><a href="/contact" class="btn btn-info btn-lg fst-italic" style="width: 250px;">Contact</a></div>
            </div>
        </div>
    </div>
    
</x-layout>