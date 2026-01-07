@foreach ($prognoze as $p)
    <p>Datum: {{ $p->forecast_date }} - Temperatura: {{ $p->temperature }}</p>
@endforeach
