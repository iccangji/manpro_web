@extends('layouts.main')
@section('container')
    <section class="mt-4">
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="background-size: cover">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $lapangan->gambar1) }}" class="d-block w-100"
                                style="height: 100%">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('storage/' . $lapangan->gambar2) }}" class="d-block w-100"
                                style="height: 100%">
                        </div>
                    </div>
                    <button class="carousel-control-prev border-0 bg-transparent" type="button"
                        data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next border-0 bg-transparent" type="button"
                        data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="about-content-wrapper">
                    <div class="page-banner-section pt-25 img-bg m-0"
                        style="background: linear-gradient(10deg, rgba(59,159,89,1) 26%, rgba(20,99,63,1) 88%);">
                        <div class="banner-content p-2">
                            <h2 class="text-white">{{ $lapangan->nama }}</h2>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="section-title">
                            <h4 class="mb-2 wow fadeInRight" data-wow-delay=".4s">RP {{ $lapangan->tarif }} / JAM</h4>
                        </div>
                        <div class="about-content">
                            <p class="mb-25 wow fadeInUp" data-wow-delay=".6s">{{ $lapangan->alamat }}</p>
                            <ul class="list-group">
                                {{ $lapangan->fitur }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <p class="mt-3">
                <h3>Jadwal Lapangan</h3>
                </p>
                <h6 class="mt-2">Lapangan
                    @for ($i = 1; $i <= $lapangan->jumlah; $i++)
                        <a href="/futsal/{{ $lapangan->id . '/' . $i }}"><button
                                class="btn btn-sm 
                                @php if(Request::is('futsal/' . $lapangan->id) == true){ 
                                        if ($i == 1) {
                                            echo ('btn-success'); }
                                        else{
                                            echo ('btn-outline-success ');}
                                            // echo ('btn-danger');
                                        }
                                    else{
                                        if($i == $index){
                                            echo ('btn-success');}
                                            else{
                                                echo ('btn-outline-success');
                                            }
                                    } @endphp
                                ">{{ $i }}</button></a>
                        {{-- <option value="$i" @if ($i == 1) selected @endif>Lapangan
                        {{ $i }}</option> --}}
                    @endfor
                </h6>
            </div>
            <div class="col-lg-12 col-xl-12 text-center">
                @include('partials.tabel-jadwal')
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-xl-12 col-lg-12">
                @if (!is_null($lapangan->maps))
                    <h3>Lokasi</h3>
                    {{-- @if $lapangan->has() --}}
                    {!! $lapangan->maps !!}
                @endif
            </div>
        </div>

        {{-- POP UP --}}
        <!-- Add content to the popup -->
        {{-- <div class="bg-light rounded p-4" id="JPO" style="width: 50%">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <h3>PEMESANAN</h3>
                </div>
                <div class="col-lg-6 col-xl-6 d-flex justify-content-end">
                    <button class="btn btn-light JPO_close">
                        <h4>X</h4>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12"> --}}
        {{-- <form class="py-2" method="POST" action="{{ url()->current() }}/konfirmasi-pembayaran"> --}}
        {{-- <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Nama</label>
                            </strong>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Lapangan</label>
                            </strong>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter email" disabled>
                        </div>
                        <div class="form-group">
                            <strong>
                                <label for="exampleInputEmail1">Hari, Jam</label>
                            </strong>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter email" disabled>
                        </div> --}}
        {{-- <div class="my-4">
                            <small>Pembayaran dilakukan melalui transfer bank, masukkan nama alias rekening anda</small>
                            <div class="form-group my-1">
                                <strong>
                                    <label for="exampleInputEmail1">Nama Rekening</label>
                                </strong>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div> --}}
        {{-- <button type="submit" class="btn btn-primary my-2 w-100">PESAN</button> --}}
        {{-- </form>
        </div>
        </div>
        <!-- Add a button to close the popup (optional) -->
        </div> --}}
    </section>
    @include('partials.popup-jadwal')
@endsection
