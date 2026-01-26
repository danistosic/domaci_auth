@extends('layout')

@section('content')
<div class="min-vh-100 d-flex align-items-center bg-dark text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-sm border-0 bg-transparent text-white">
                    <div class="card-body p-4">

                        <h1 class="h3 mb-4 text-center fw-semibold">
                            <i class="fa-solid fa-house me-2"></i>
                            Pronađi svoj grad
                        </h1>

                        {{-- Error poruka --}}
                        @if(Illuminate\Support\Facades\Session::has('error'))
                            <p class="text-danger text-center mb-3">
                                {{ Illuminate\Support\Facades\Session::get('error') }}
                            </p>
                        @endif

                        {{-- FAVORITI --}}
                        @if(isset($userFavourites) && count($userFavourites) > 0)
                            <div class="mb-4">
                                <h5 class="mb-2">Tvoji favoriti:</h5>

                                <ul class="list-group">
                                    @foreach($userFavourites as $userFavourite)
                                        <li class="list-group-item bg-dark text-white border-secondary">
                                            {{ $userFavourite->city->name }}
                                            {{ $userFavourite->city->todaysForecast->temperature }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Forma za pretragu --}}
                        <form action="/forecast/search" method="GET" class="d-flex flex-column gap-3">
                            <input
                                class="form-control"
                                type="text"
                                name="city"
                                placeholder="Unesite ime grada"
                            >

                            <button type="submit" class="btn btn-primary fw-semibold">
                                <i class="fa-brands fa-searchengin me-2"></i>
                                Pronađi
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection










