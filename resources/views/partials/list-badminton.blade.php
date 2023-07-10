<div class="row d-flex">
    @foreach ($badminton as $badminton)
        <div class="col-xl col-lg col-md">
            <div class="single-pricing mb-25">
                <h3>{{ $badminton->nama }}</h3>
                <h5>Lokasi: {{ $badminton->alamat }}</h5>
                <h4>Rp. {{ $badminton->tarif }}</h4>
                <img class="img-fluid rounded field-card" src="{{ asset('storage/' . $badminton->gambar1) }}"
                    alt="404">
                <ul>
                    <li>{{ $badminton->jumlah }} Lapangan</li>
                    <li>{{ $badminton->fitur }}</li>
                </ul>
                <a href="/badminton/{{ $badminton->id }}" class="theme-btn">Lihat Jadwal</a><br>
            </div>
    @endforeach
</div>
