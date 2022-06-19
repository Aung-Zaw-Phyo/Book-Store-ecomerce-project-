<x-layout>
    <x-info />

    <div class="heroBacAbout">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <h1>About Us</h1>
        </div>
    </div>

    <div class="">
        <div class="container py-5 my-5">
            <div class="row g-3">
                <div class="col-md-6 p-3">
                    <img class="w-100" src="/images/books/about-img.jpg" style="height: 400px" alt="">
                </div>
                <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                    <h2>Why Choose Us</h2>
                    <p class="text-secondary normal-fs my-3 mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit delectus temporibus consectetur sequi cum, hic dolorum deserunt? Sit, eaque iste aliquam voluptas doloremque ab doloribus quaerat quo unde sequi, labore perspiciatis nemo repudiandae reprehenderit ratione quibusdam! Dolore quam cumque porro asperiores, illo laboriosam ratione iusto magnam nostrum voluptates ducimus unde.</p>
                    <div class=""><a href="/contact" class="btn btn-warning btn-lg fst-italic">Contact Us</a></div>
                </div>
            </div>
        </div>
    </div>

    <div style="background-color:rgba(211, 211, 211, 0.179); " id="review">
        
        @if ($reviews->count())
        <x-review :reviews='$reviews' />
        @endif

        <div style="background-color:rgba(211, 211, 211, 0.281); " class="py-5 container-fluid">
            <div class="row mt-4">
                <h2 class="text-center mb-4"> You can write something about us </h2>
                <div class="col-md-8 mx-auto">
                    <div class="card p-4">
                        <form action="/review/add" method="POST">
                            @csrf
                            <textarea  name="body" type="text" 
                                class="form-control " placeholder="Enter your message ..." 
                                cols="30" rows="5" required >
                            </textarea>
                            <x-error name='body' />
                            <button class="btn btn-lg btn-primary d-block mx-auto mt-4"  style="z-index: 0 !important;" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="">
        <div class="container py-5">
            <div class="d-flex flex-column align-items-center">
                <h2 class="">Greate Authors</h2>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-12 col-lg-4 p-3">
                    <div class="person text-center">
                        <img src="/images/authors/author-1.jpg" alt="" class=" mx-auto d-block img-thumbnail" style="width: 200px; height: 200px; border-radius: 50%; background-color:rgb(233, 231, 231);">
                        <h3 class="fw-bold pt-3">Larry Parker</h3>
                        <h6 class="fw-bold fst-italic text-muted pb-3">Novel Writer</h6>
                        <div class="">
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-facebook text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-twitter text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-linkedin-in text-light"></i></button>
                            <button type="button" class="btn bg-dark" style="border-radius: 50%;"><i class="fa-brands fa-instagram text-light"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="person text-center">
                        <img src="/images/authors/author-2.jpg" alt="" class=" mx-auto d-block img-thumbnail" style="width: 200px; height: 200px; border-radius: 50%; background-color:rgb(233, 231, 231);">
                        <h3 class="fw-bold pt-3">Larry Parker</h3>
                        <h6 class="fw-bold fst-italic text-muted pb-3">Novel Writer</h6>
                        <div class="">
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-facebook text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-twitter text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-linkedin-in text-light"></i></button>
                            <button type="button" class="btn bg-dark" style="border-radius: 50%;"><i class="fa-brands fa-instagram text-light"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="person text-center">
                        <img src="/images/authors/author-3.jpg" alt="" class=" mx-auto d-block img-thumbnail" style="width: 200px; height: 200px; border-radius: 50%; background-color:rgb(233, 231, 231);">
                        <h3 class="fw-bold pt-3">Larry Parker</h3>
                        <h6 class="fw-bold fst-italic text-muted pb-3">Novel Writer</h6>
                        <div class="">
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-facebook text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-twitter text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-linkedin-in text-light"></i></button>
                            <button type="button" class="btn bg-dark" style="border-radius: 50%;"><i class="fa-brands fa-instagram text-light"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="person text-center">
                        <img src="/images/authors/author-4.jpg" alt="" class=" mx-auto d-block img-thumbnail" style="width: 200px; height: 200px; border-radius: 50%; background-color:rgb(233, 231, 231);">
                        <h3 class="fw-bold pt-3">Larry Parker</h3>
                        <h6 class="fw-bold fst-italic text-muted pb-3">Novel Writer</h6>
                        <div class="">
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-facebook text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-twitter text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-linkedin-in text-light"></i></button>
                            <button type="button" class="btn bg-dark" style="border-radius: 50%;"><i class="fa-brands fa-instagram text-light"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="person text-center">
                        <img src="/images/authors/author-5.jpg" alt="" class=" mx-auto d-block img-thumbnail" style="width: 200px; height: 200px; border-radius: 50%; background-color:rgb(233, 231, 231);">
                        <h3 class="fw-bold pt-3">Larry Parker</h3>
                        <h6 class="fw-bold fst-italic text-muted pb-3">Novel Writer</h6>
                        <div class="">
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-facebook text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-twitter text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-linkedin-in text-light"></i></button>
                            <button type="button" class="btn bg-dark" style="border-radius: 50%;"><i class="fa-brands fa-instagram text-light"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="person text-center">
                        <img src="/images/authors/author-6.jpg" alt="" class=" mx-auto d-block img-thumbnail" style="width: 200px; height: 200px; border-radius: 50%; background-color:rgb(233, 231, 231);">
                        <h3 class="fw-bold pt-3">Larry Parker</h3>
                        <h6 class="fw-bold fst-italic text-muted pb-3">Novel Writer</h6>
                        <div class="">
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-facebook text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-twitter text-light"></i></button>
                            <button type="button" class="btn bg-dark me-1" style="border-radius: 50%;"><i class="fab fa-linkedin-in text-light"></i></button>
                            <button type="button" class="btn bg-dark" style="border-radius: 50%;"><i class="fa-brands fa-instagram text-light"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>