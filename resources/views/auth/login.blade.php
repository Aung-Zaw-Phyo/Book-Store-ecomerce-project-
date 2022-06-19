<x-layout>
    <div>
        <div class="container py-5">
            <h1 class="text-center"> Login Form </h1>
            <div class="row mt-4">
                <div class="col-md-6 p-4 mx-auto">
                    <div class="card shadow p-3 py-4">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Your Email</label>
                                <input name="email" value="{{old('email')}}" type="email" class=" form-control "  placeholder="Enter your email" id="email" required>
                                <x-error name='email' />
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Your Password</label>
                                <input name="password" type="password" class=" form-control "  placeholder="Enter your password" id="password" required>
                                <x-error name='password' />
                            </div>
                            <button type="submit" class="btn btn-primary d-block mx-auto">Login Now</button>
                            <div class="text-center mt-4">
                                Don't have an account? <a href="/register">Register Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>