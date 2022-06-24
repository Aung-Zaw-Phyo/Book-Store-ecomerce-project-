@if (session('info'))
        <div class="alert alert-warning alert-dismissible fade show mt-5 pt-4 mb-0" role="alert">
                <div class="container d-flex align-items-center py-2 position-relative">
                        <strong>{{session('info')}}</strong>
                        <button type="button" class="btn-close"  data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        </div>
@endif