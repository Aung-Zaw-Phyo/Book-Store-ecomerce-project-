<x-adminLayout>
    <div class="container py-5 p-0 text-center">
        <h2 class="text-center">Income Money</h2>
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-md-4 m-3">
                <div hidden> {{$pendingMoney=0}} </div>
                @foreach ($pending as $item)
                    <div hidden> {{$pendingMoney += $item->totalPrice}} </div>
                @endforeach
                <div class="card shadow p-3">
                    <h4 class="fst-italic">Total Pending Money</h4>
                    <h4 class="mt-3">${{$pendingMoney}}</h4>
                </div>
            </div>
            <div class="col-md-4 m-3">
                <div hidden> {{$completedMoney=0}} </div>
                @foreach ($completed as $item)
                    <div hidden> {{$completedMoney += $item->totalPrice}} </div>
                @endforeach
                <div class="card shadow p-3">
                    <h4 class="fst-italic">Total Completed Money</h4>
                    <h4 class="mt-3">${{$completedMoney}}</h4>
                </div>
            </div>
        </div>
    </div>
</x-adminLayout>