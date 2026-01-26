@extends('layout')

@section('content')
<div class="min-vh-100 bg-dark text-white py-5">
    <div class="container">

        {{-- Error poruka ako korisnik nije logiran --}}
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="d-flex align-items-center gap-3 mb-4">
                <p class="text-danger fw-bold mb-0">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </p>
                <a class="btn btn-primary" href="/login">Ulogujte se</a>
            </div>
        @endif

        <div class="row mt-5">
            @foreach($cities as $city)

                @php
                    $icon = '';
                    if ($city->todaysForecast) {
                        $icon = \App\Http\ForecastHelper::getIconByWeatherType(
                            $city->todaysForecast->weather_type
                        );
                    }
                @endphp

                <div class="col-md-3 mb-4">
                    <div class="card bg-primary text-white h-100">
                        <div class="card-body d-flex flex-column justify-content-between">

                            {{-- Naziv grada + favourite --}}
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <strong>{{ $city->name }}</strong>

                                @if(isset($userFavourites) && in_array($city->id, $userFavourites))
                                    <a href="{{ route('city.unfavourite', ['city' => $city->id]) }}"
                                       class="text-white">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                @else
                                    <a href="{{ route('city.favourite', ['city' => $city->id]) }}"
                                       class="text-white">
                                        <i class="fa-regular fa-heart"></i>
                                    </a>
                                @endif
                            </div>

                            {{-- Ikona + link na prognozu --}}
                            <div>
                                @if($icon !== '')
                                    <i class="fa-solid {{ $icon }} me-2"></i>
                                @endif

                                <a href="{{ route('forecast.permalink', ['city' => $city->name]) }}"
                                   class="text-white text-decoration-none">
                                    Pogledaj prognozu
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach
        </div>

    </div>
</div>
@endsection







