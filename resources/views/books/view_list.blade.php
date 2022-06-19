<x-layout>
    <div>
        <div class="container py-5">
            <div class="row">
                @if ($orders->count())
                    @foreach ($orders as $order)
                    <div class="col-12 my-3">
                        <div class="card shadow p-3 text-center">
                            <div class="normal-fs">
                                <span class="text-secondary"> Books : </span> {{$order->books}}
                            </div>
                            <div class="normal-fs my-2">
                                <span class="text-secondary"> TotalPrice : </span> ${{$order->totalPrice}}
                            </div>
                            <div class="normal-fs">
                                <span class="text-secondary"> Ordered Date : </span> {{$order->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 my-3 text-center">
                        <div class="alert alert-warning text-center py-3 m-0"> This user don't still buy anything . </div>
                    </div>
                @endif
            </div>

            <div>
                <a href="/about#review" class="btn btn-secondary mt-4">Back</a>
            </div>
        </div>
    </div>
</x-layout>