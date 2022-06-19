<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning text-center py-3 m-0"> {{session('info')}} </div>
    @endif
    <div class="container py-5 p-0">
        <h2 class="text-center">Book Edit Form</h2>
        <div class="row mt-4">
            <div class="col-md-8 mx-auto">
                <div class="card shadow p-3 py-4">
                    <form action="/admin/product/update/{{$book->id}}" method="POST" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Book name</label>
                            <input name="name" value="{{old('name', $book->name)}}" type="text" class=" form-control " placeholder="Enter book name"  id="name">
                            <x-error name='name' />
                        </div>
                        <div class="mb-4">
                            <label for="author" class="form-label">Author name</label>
                            <input name="author" value="{{old('author', $book->author)}}" value="{{old('name')}}" type="text" class=" form-control " placeholder="Enter author name"  id="author">
                            <x-error name='author' />
                        </div>
                        <div class="mb-4">
                            <label for="price" class="form-label">Book price</label>
                            <input name="price" value="{{old('price', $book->price)}}" type="text" class=" form-control " placeholder="Enter book price"  id="price">
                            <x-error name='price' />
                        </div>
                        <div class="mb-4">
                            <label for="thumbnail" class="form-label">Book thumbnail</label>
                            <input type="file" value="{{old('thumbnail')}}" class="form-control" name="thumbnail" id="thumbnail">
                            <img src="/storage/{{$book->thumbnail}}" class="shadow m-2 img-thumbnail" width="90px" height="120px" alt="">
                            <x-error name='thumbnail' />
                        </div>
                        <div class="mb-4">
                            <label for="category" class="form-label">Book category</label>
                            <select name="category_id" id="category" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == old('category_id', $book->category->id) ? 'selected' : null}}>{{$category->name}}</option>                                    
                                @endforeach
                            </select>
                            <x-error name='category_id' />
                        </div>
                        <button type="submit" class="btn btn-primary d-block mx-auto">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>