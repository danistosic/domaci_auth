@extends("layout")

@section("content")
    <div class="min-vh-100 d-flex align-items-center bg-dark text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card shadow-sm border-0 bg-transparent text-white">
                        <div class="card-body p-4">
                            <h1 class="h3 mb-3 text-center fw-semibold">
                                <i class="fa-solid fa-house me-2"></i>
                                Pronadji svoj grad
                            </h1>

                            @if(\Illuminate\Support\Facades\Session::has("error"))
                                <p class="text-danger text-center mb-3">
                                    {{ \Illuminate\Support\Facades\Session::get("error") }}
                                </p>
                            @endif

                            <form action="/forecast/search" method="GET" class="d-flex flex-column gap-3">
                                <div>
                                    <input class="form-control" type="text" name="city"
                                        placeholder="Unesite ime grada">
                                </div>
                                <button type="submit" class="btn btn-primary w-100 fw-semibold">
                                    <i class="fa-brands fa-searchengin me-2"></i>
                                    Pronadji
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




