@extends("admin.layout")

@section("content")
    <div class="container py-4">
        <h2 class="mb-4">Kreiranje novog forecasta</h2>

        <form method="POST" action="{{ route("forecasts.create") }}" class="card shadow-sm p-3 mb-4">
            {{ csrf_field() }}

            <div class="row g-3">
                <div class="col-12 col-lg-4">
                    <label class="form-label">Grad</label>
                    <select name="city_id" class="form-select">
                        @foreach(\App\Models\Cities::all() as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-lg-4">
                    <label class="form-label">Temperatura</label>
                    <input type="text" name="temperature" class="form-control" placeholder="Unesite temperaturu">
                </div>

                <div class="col-12 col-lg-4">
                    <label class="form-label">Tip vremena</label>
                    <select name="weather_type" class="form-select">
                        @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
                            <option>{{ $weather }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-lg-4">
                    <label class="form-label">Šansa za padavine</label>
                    <input type="text" name="probability" class="form-control" placeholder="Unesite šansu za padavine">
                </div>

                <div class="col-12 col-lg-4">
                    <label class="form-label">Datum</label>
                    <input type="date" name="forecast_date" class="form-control">
                </div>

                <div class="col-12 col-lg-4 d-flex align-items-end">
                    <button class="btn btn-primary w-100">Snimi</button>
                </div>
            </div>
        </form>

        <div class="row g-3">
            @foreach(\App\Models\Cities::all() as $city)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header fw-semibold">{{ $city->name }}</div>
                        <ul class="list-group list-group-flush">
                            @foreach($city->forecasts as $forecast)
                                @php
                                    $boja = \App\Http\ForecastHelper::getColorByTemperature($forecast->temperature);
                                    $ikonica = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);
                                @endphp
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $forecast->forecast_date }}</span>
                                    <span class="d-flex align-items-center gap-2" style="color: {{ $boja }};">
                                        @if($ikonica !== '')
                                            <i class="fa-solid {{ $ikonica }}"></i>
                                        @endif
                                        {{ $forecast->temperature }}°C
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection



















