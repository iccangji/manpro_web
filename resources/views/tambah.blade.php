@extends('layouts.main')
@section('container')
    <div class="col-xl-6 col-lg-7 col-md-10 mx-auto">
        <div class="section-title text-center mb-60">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h2 class="wow fadeInUp" data-wow-delay=".4s">Tambah Lapangan</h2>
            {{-- <p class="wow fadeInUp" data-wow-delay=".6s">At vero eos et accusamus et iusto odio
                dignissimos ducimus quiblanditiis praesentium</p> --}}
        </div>
        <form method="POST" action="{{ url()->current() }}/simpan" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="name@example.com"
                    autofocus>
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="pemilik" class="form-control" id="pemilik" placeholder="name@example.com">
                <label for="floatingInput">Pemilik</label>
            </div>
            <select class="form-select mb-3" name="olahraga" id="olahraga" aria-label="Default select example">
                <option selected>Pilih Olahraga</option>
                <option value="futsal">Futsal</option>
                <option value="badminton">Badminton</option>
            </select>
            <div class="form-floating mb-3 d-inline">
                <div class="">
                    <label for="floatingInput">Gambar 1</label>
                    <input type="file" name="gambar1" class="d-inline form-control mb-3" id="gambar1"
                        placeholder="Jam">
                </div>
            </div>
            <div class="form-floating mb-3 d-inline">
                <div class="">
                    <label for="floatingInput">Gambar 2</label>
                    <input type="file" name="gambar2" class="d-inline form-control mb-3" id="gambar2"
                        placeholder="Jam">
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="name@example.com">
                <label for="floatingInput">Alamat</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="fitur" class="form-control" id="fitur" placeholder="name@example.com">
                <label for="floatingInput">Fitur</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="tarif" class="form-control" id="tarif" placeholder="name@example.com">
                <label for="floatingInput">Tarif</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="name@example.com">
                <label for="floatingInput">Jumlah Lapangan</label>
            </div>
            <select class="form-select mb-3" name="hari_libur" aria-label="Default select example">
                <option selected>Hari Libur</option>
                <option value="0">Minggu</option>
                <option value="1">Senin</option>
                <option value="2">Selasa</option>
                <option value="3">Rabu</option>
                <option value="4">Kamis</option>
                <option value="5">Jumat</option>
                <option value="6">Sabtu</option>
            </select>
            <label for="floatingInput">Jam Buka</label>
            <div class="mb-3">
                <input type="text" name="jam_buka" class="d-inline form-control w-50 mb-3" id="jam_buka"
                    placeholder="Jam">
                <input type="text" name="user" class="d-inline form-control w-25 mb-3" id="floatingInput"
                    value="00:00" id="disabledTextInput" disabled>
            </div>
            <label for="floatingInput">Jam Tutup</label>
            <div class="mb-3">
                <input type="text" name="jam_tutup" class="d-inline form-control w-50 mb-3" id="jam_tutup"
                    placeholder="Jam">
                <input type="text" name="user" class="d-inline form-control w-25 mb-3" id="floatingInput"
                    value="00:00" id="disabledTextInput" disabled>
            </div>
            <label for="floatingInput">Jam Istirahat</label>
            <div class="mb-3">
                <input type="text" name="jam_istirahat" class="d-inline form-control w-50 mb-3" id="jam_istirahat"
                    placeholder="Jam">
                <input type="text" name="user" class="d-inline form-control w-25 mb-3" id="floatingInput"
                    value="00:00" id="disabledTextInput" disabled>
            </div>
            <label for="floatingInput">Jam Buka Kembali</label>
            <div class="mb-3">
                <input type="text" name="jam_buka_kembali" class="d-inline form-control w-50 mb-3"
                    id="jam_buka_kembali" placeholder="Jam">
                <input type="text" name="user" class="d-inline form-control w-25 mb-3" id="floatingInput"
                    value="00:00" id="disabledTextInput" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
