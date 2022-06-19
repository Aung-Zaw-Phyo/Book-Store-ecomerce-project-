<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning text-center py-3 m-0"> {{session('info')}} </div>
    @endif
    <div class="container py-5 p-0 ">
        <h2 class="text-center"> Posted List </h2>
        <h5 class="mt-3 text-primary"> <span class="fw-bold">{{$user->name}}</span> posted products </h5>
        <div class="row mt-3">
            @if ($user->books->count())
            @foreach ($user->books()->paginate(8) as $book)
            <x-admin-card :book="$book"/>
            @endforeach
            @else
            <div class="col-12 my-3 text-center">
                <div class="alert alert-warning text-center py-3 m-0"> There is no posted product . </div>
            </div>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">  {{$user->books()->paginate(8)->links()}} </div>
    </div>
</x-adminLayout>