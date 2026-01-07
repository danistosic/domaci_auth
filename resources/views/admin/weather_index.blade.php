<div style="max-width: 600px; margin: 40px auto; font-family: Arial, sans-serif;">

    <h2 style="text-align: center; margin-bottom: 20px;">
        Upravljanje vremenskim podacima
    </h2>

    {{-- Forma --}}
    <form method="POST" action="{{ route('weather.update') }}"
          style="display: flex; gap: 10px; margin-bottom: 30px; justify-content: center;">
        @csrf

        <input type="text"
               name="temperature"
               placeholder="Unesite temperaturu"
               style="padding: 8px; width: 160px; border: 1px solid #bbb; border-radius: 5px;">

        <select name="city_id"
                style="padding: 8px; border: 1px solid #bbb; border-radius: 5px;">
            @foreach(\App\Models\Cities::all() as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <button type="submit"
                style="padding: 8px 14px; background: #007bff; color: #fff;
                       border: none; border-radius: 5px; cursor: pointer;">
            Snimi
        </button>
    </form>

    {{-- Lista gradova i temperatura --}}
    <div style="background: #f8f8f8; padding: 20px; border-radius: 8px;">
        @foreach(\App\Models\Weather::all() as $weather)
            <p style="margin: 6px 0; font-size: 16px;">
                <strong>{{ $weather->city->name }}</strong>
                —
                <span style="color: #444;">
                    {{ $weather->temperature }}°C
                </span>
            </p>
        @endforeach
    </div>

</div>





