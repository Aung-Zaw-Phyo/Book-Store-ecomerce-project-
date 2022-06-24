<x-adminLayout>
  @if (session('info'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <div class="container">
          <strong>{{session('info')}}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
@endif
    <div class="container py-5 p-0">
        <h2 class="text-center">All Categories</h2>
        <div class="row mt-4">
            <div class="col-md-8 mx-auto mt-3">
                <div class="p-3 card shadow">
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($categories as $category)
                              <tr>
                                <th>{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td class="d-flex">
                                    <a href="/admin/category/edit/{{$category->id}}" class="btn  btn-warning me-2">Edit</a>
                                    <form action="/admin/category/delete/{{$category->id}}" method="POST">
                                      @method('delete')
                                      @csrf
                                      <button type="submit" class="btn  btn-danger">Delete</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3 ">
          {{$categories->links()}}
        </div>
    </div>
</x-adminLayout>