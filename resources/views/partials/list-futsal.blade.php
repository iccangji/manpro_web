<div class="row d-flex">
    @foreach ($futsal as $futsal)
        <div class="col-xl col-lg col-md">
            <div class="single-pricing mb-25">
                <h3>{{ $futsal->nama }}</h3>
                <h5>Lokasi: {{ $futsal->alamat }}</h5>
                <h4>Rp. {{ $futsal->tarif }}</h4>
                <img class="img-fluid rounded field-card" src="{{ asset('storage/' . $futsal->gambar1) }}" alt="404">
                {{-- <img class="img-fluid rounded field-card" src="{{ asset('storage/' . $futsal->gambar2) }}" alt="404"> --}}
                <ul>
                    <li>{{ $futsal->jumlah }} Lapangan</li>
                    <li>{{ $futsal->fitur }}</li>
                </ul>
                <a href="/futsal/{{ $futsal->id }}" class="theme-btn">Lihat Jadwal</a><br>
            </div>
        </div>
    @endforeach

</div>
