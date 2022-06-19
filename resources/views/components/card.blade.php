@props(['book'])
<div class="col-md-4 p-4">
    <div class="card cardCon p-2 shadow text-center">
        <form action="/cart/add/{{$book->id}}" method="POST">
            @csrf
            <img src="/storage/{{$book->thumbnail}}" class="my-3 img-thumbnail bookImg" style="height: 280px;" alt="">
            <div class="fs-5 mb-1 "> {{$book->name}} </div>
            <div class="mb-1 ">Author - {{$book->author}}</div>
            <div class=" mb-1 price bg-danger text-light py-1 px-2"> ${{$book->price}} </div>
            <div class="d-flex mb-1 justify-content-center">
                <select name="total" class="form-control form-control-sm normal-fs my-1 w-75" id="">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            {{-- <input type="hidden" name='book_id' value="{{$book->id}}"> --}}
            <button class="btn btn-outline-primary my-2 w-50" type="submit">Add to card</button>
        </form>
    </div>
</div>