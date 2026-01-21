@extends("layout")

@section("content")
    <div class="min-vh-100 bg-dark text-white py-5">
        <div class="container">
            <div class="d-flex flex-wrap">
                @foreach($cities as $city)
                    @php
                        $icon = '';
                        if ($city->todaysForecast) {
                            $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type);
                        }
                    @endphp
                    <p class="m-0">
                        <a class="btn btn-primary text-white m-2"
                            href="{{ url('/forecast/' . $city->name) }}">
                            @if($icon !== '')
                                <i class="fa-solid {{ $icon }} me-2"></i>
                            @endif
                            {{ $city->name }}
                        </a>
                    </p>
                @endforeach
            </div>
        </div>
    </div>
@endsection

