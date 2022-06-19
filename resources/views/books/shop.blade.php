<x-layout>
    <x-info />

    <div class="heroBacShop">
        <div class="container h-100">
            <div class="row d-flex align-items-center h-100">
                <div class="col-md-6 p-3">
                    <div>
                        <h1>Year end sale</h1>
                        <h1 class="fst-italic" style="color:rgba(177, 106, 244, 0.8);">Get 70% Off for All <br> Design Books </h1>
                    </div>
                    <div class="w-75 my-4 text-secondary normal-fs">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae ipsam eum doloremque id adipisci dolorem saepe. Blanditiis cum laudantium necessitatibus iste veritatis fuga quae nihil!
                    </div>
                    <div>
                        <a href="#products" class="btn btn-lg w-50 btn-outline-primary">Our Shop</a href="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="products">
        <div class="container py-5" >
            <div class="d-flex flex-column align-items-center">
                <h2 class="">Our Products</h2>
                <div class="divider"></div>
            </div>

            <x-category-dropdown />

            <div class="my-4">
                <form action="" method="GET">
                    <div class="input-group">
                        @if(request('category'))
                        <input
                        type="hidden"
                        name="category"
                        value="{{request('category')}}"
                        />
                        @endif
                        <input type="text" name="search" value="{{request('search')}}" class="form-control" placeholder="Search books ....">
                        <button class="btn btn-primary" style="z-index: 0 !important;" type="submit">Search</button>
                    </div>
                </form>
            </div>

            <div class="row g-3 mt-3">
                @forelse ($books as $book)
                <x-card :book="$book"/>
                @empty
                <div class="text-danger text-center">No Book Found!</div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{$books->links()}}
            </div>
        </div>
    </div>

</x-layout>
