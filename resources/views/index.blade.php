@extends('layouts.main')

@section('container')
    @if (session()->has('log'))
        <div class="row mx-2">
            <div class=" alert alert-success alert-dismissible fade show" role="alert">
                {{-- Selamat datang, {{ $name }}! --}}
                {{ session('log') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    <div class="col-xl-12 col-lg-12 col-md-12 mx-auto  text-light py-2"
        style="background: linear-gradient(to left, #3faa5f 50.39%, #198754 100%);">
        <div class="section-title text-center mb-55">
            <h2><span class="wow fadeInDown text-light" data-wow-delay=".2s">Sportky</span></h2>
            <h4 class="wow fadeInUp text-light" data-wow-delay=".4s">Sewa Lapangan Olahraga di Kota Kendari</h4>
        </div>
    </div>
    </div>

    @if (auth()->user()->level != 'lapangan')
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="feature-box box-style">
                    <div class="feature-icon box-icon-style">
                        <iconify-icon icon="fluent:sport-soccer-20-filled" width="48"></iconify-icon>
                    </div>
                    <div class="box-content-style feature-content">
                        <h4><b>{{ count($count_futsal) }}
                            </b> Lapangan Futsal</h4>
                        <p>
                            <a href="/futsal/"><button class="theme-btn">Lihat</button></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="feature-box box-style">
                    <div class="feature-icon box-icon-style">
                        <iconify-icon icon="mdi:badminton" width="48"></iconify-icon>
                    </div>
                    <div class="box-content-style feature-content">
                        <h4><b>{{ count($count_badminton) }}</b> Lapangan Badminton</h4>
                        <p>
                            <a href="/badminton"><button class="theme-btn">Lihat</button></a>
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="feature-box box-style">
                        <div class="feature-icon box-icon-style">
                            @if ($info->olahraga == 'futsal')
                                <iconify-icon icon="fluent:sport-soccer-20-filled" width="48"></iconify-icon>
                            @else
                                <iconify-icon icon="mdi:badminton" width="48"></iconify-icon>
                            @endif
                        </div>
                        <h3>INFO LAPANGAN</h3>
                        <div class="box-content-style feature-content">
                            <img src="{{ asset('storage/' . $info->gambar1) }}" width="400">
                            <h4>{{ $info->nama }}</h4>
                            <span class="d-block">Alamat: {{ $info->alamat }}</span class="d-block">
                            <span class="d-block">Fitur: {{ $info->fitur }}</span class="d-block">
                            <span class="d-block">Tarif: Rp. {{ $info->tarif }}</span class="d-block">
                            <span class="d-block">Jam tersedia: {{ $info->jam_buka . ' - ' . $info->jam_tutup }}</span
                                class="d-block">
                            <span class="d-block">Jam istirahat:
                                {{ $info->jam_istirahat . ' - ' . $info->jam_buka_kembali }}</span class="d-block">
                            <span class="d-block">Hari libur: {{ $libur[$info->hari_libur] }}</span class="d-block">
                            <p class="mt-2">
                                <a href="/edit/{{ $info->id }}"><button class="theme-btn">Edit</button></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <!-- <div class="col-lg-4 col-md-6">
                                                                                                                                                                    <div class="feature-box box-style">
                                                                                                                                                                        <div class="feature-icon box-icon-style">
                                                                                                                                                                            <i class="lni lni-agenda"></i>
                                                                                                                                                                        </div>
                                                                                                                                                                        <div class="box-content-style feature-content">
                                                                                                                                                                            <h4><b>7</b> Pengguna</h4>
                                                                                                                                                                            <p>
                                                                                                                                                                                <button class="theme-btn">Kelola</button>
                                                                                                                                                                            </p>
                                                                                                                                                                        </div>
                                                                                                                                                                    </div>
                                                                                                                                                                    </div> -->
    <div class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about-img-wrapper">
                        <div class="about-img position-relative d-inline-block wow fadeInLeft" data-wow-delay=".3s">
                            <img src="assets/img/about/about_badminton.jpg" class="rounded mx-auto d-block" alt="">
                            <div class="about-experience">
                                <h3><i>Mens Sana in Corpore Sano</i></h3>
                                <p>Dalam tubuh yang sehat, terdapat jiwa yang kuat</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="about-content-wrapper">
                        <div class="section-title">
                            <span class="wow fadeInUp" data-wow-delay=".2s">About Us</span>
                            <h2 class="mb-40 wow fadeInRight" data-wow-delay=".4s">Kendari Sehat besama Sportky</h2>
                        </div>
                        <div class="about-content">
                            <p class="mb-45 wow fadeInUp" data-wow-delay=".6s">Kami lahir dengan visi menciptakan
                                masyarakat Kendari yang sehat dan juga sebagai media pelepas penat di tengah waktu yang
                                padat</p>
                            <div class="counter-up wow fadeInUp" data-wow-delay=".5s">
                                <div class="counter">
                                    <span id="secondo" class="countup count color-1" cup-end="30"
                                        cup-append="k">2023</span>
                                    <h4>Tahun Berdiri</h4>
                                    <p>Lahir dari ide-ide remaja Kendari <br class="d-none d-md-block d-lg-none d-xl-block">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
