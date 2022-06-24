<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="container">
                <strong>{{session('info')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container py-5 p-0 text-center">
        <h2 class="text-center">All Books ( {{$count}} )</h2>
        <div class="row mt-3">
            @foreach ($books as $book)
            <x-admin-card :book="$book" />
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">{{$books->links()}}</div>
    </div>
</x-adminLayout>