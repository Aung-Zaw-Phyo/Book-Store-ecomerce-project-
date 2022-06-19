<x-adminLayout>
    @if (session('info'))
        <div class="alert alert-warning text-center py-3 m-0"> {{session('info')}} </div>
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