<x-layout>
    <x-info />

    <div class="heroBacAbout">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <h1>Contact Us</h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class=" text-center mb-4">Say Something!</h2>
                <div class="card p-4 bg-light">
                    <form action="/message/add" method="POST">
                        @csrf
                        <div class="my-3">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control " placeholder="Enter your name" required>
                            <x-error name='name' />
                        </div>
                        
                        <div class="my-3">
                            <input type="email" name="email" value="{{old('email')}}" class="form-control  " placeholder="Enter your email" required>
                            <x-error name='email' />
                        </div>
                        <div class="my-3">
                            <input type="number" name="number" value="{{old('number')}}" class="form-control " placeholder="Enter your number" required>
                            <x-error name='number' />
                        </div>
                        <div class="my-3">
                            <textarea class="form-control " name="message" value="{{old('message')}}" id="" cols="30" rows="5" placeholder="Enter your message" required></textarea>
                            <x-error name='message' />
                        </div>
                        <div class="text-center mt-2">
                            <button class="btn btn-primary" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>