<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning text-center py-3 m-0"> {{session('info')}} </div>
    @endif
    <div class="container py-5 p-0">
        <h2 class="text-center">Category Create Form</h2>
        <div class="row mt-4">
            <div class="col-md-8 mx-auto mt-3">
                <div class="card shadow p-3 py-4">
                    <form action="/admin/categories/add" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Category name</label>
                            <input name="name" value="{{old('name')}}" type="text" class=" form-control  " required placeholder="Enter category name"  id="name">
                            <x-error name='name' />
                        </div>
                        <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>