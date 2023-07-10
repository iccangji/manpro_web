@extends('layouts.main')

@section('container')
    <section id="pricing" class="pricing-section">
        <div class="container">
            <div class="row">
                @if (auth()->user()->level != 'admin')
                    <div class="col-xl-6 col-lg-7 col-md-10 mx-auto">
                        <div class="section-title text-center mb-60">
                            <span class="wow fadeInDown" data-wow-delay=".2s">Sportky</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Jadwal Lapangan</h2>

                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="pricing-btn text-center wow fadeInUp" data-wow-delay=".3s">
                        <ul class="nav justify-content-center mb-90" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('futsal') ? 'active' : '' }}" id="pills-1-tab"
                                    data-bs-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1"
                                    aria-selected="true">Futsal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('badminton') ? 'active' : '' }}" id="pills-2-tab"
                                    data-bs-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2"
                                    aria-selected="false">Badminton</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade {{ Request::is('futsal') ? 'show active' : '' }}" id="pills-1" role="tabpanel"
                    aria-labelledby="pills-home-tab">
                    @include('partials.list-futsal')
                </div>
                <!-- PILLS2 -->
                <div class="tab-pane fade {{ Request::is('badminton') ? 'show active' : '' }}" id="pills-2"
                    role="tabpanel" aria-labelledby="pills-2-tab">
                    @include('partials.list-badminton')
                </div>
            </div>
        @else
            <div class="col-xl-12 col-lg-12">
                <a href="/lapangan/tambah">
                    <button class="btn btn-success my-2">Tambah Data</button>
                </a>
                <table class="table">
                    <tr>
                        <th class="table-success">Nama</th>
                        <th class="table-success">Pemilik</th>
                        <th class="table-success">Alamat</th>
                        <th class="table-success">Fitur</th>
                        <th class="table-success">Tarif</th>
                        <th class="table-success">Jumlah Lapangan</th>
                        <th class="table-success">Jam Tersedia</th>
                        <th class="table-success">Jam Istirahat</th>
                        <th class="table-success">Hari Libur</th>
                        <th class="table-success">Aksi</th>
                    </tr>
                    @for ($i = 0; $i < count($lapangan); $i++)
                        <tr>
                            <td>{{ $lapangan[$i]->nama }}</td>
                            <td>{{ $lapangan[$i]->pemilik }}</td>
                            <td>{{ $lapangan[$i]->alamat }}</td>
                            <td>{{ $lapangan[$i]->fitur }}</td>
                            <td>{{ $lapangan[$i]->tarif }}</td>
                            <td>{{ $lapangan[$i]->jumlah }}</td>
                            <td>{{ $lapangan[$i]->jam_buka . ' - ' . $lapangan[$i]->jam_tutup }}</td>
                            <td>{{ $lapangan[$i]->jam_istirahat . ' - ' . $lapangan[$i]->jam_buka_kembali }}</td>
                            <td>{{ $libur[$lapangan[$i]->hari_libur] }}</td>
                            <td><a href="/lapangan/edit/{{ $lapangan[$i]->id }}" class="text-light"><button type="button"
                                        class="btn btn-dark"><i class="bi bi-pencil-square"></i></a></button>
                            </td>
                        </tr>
                    @endfor
                </table>
            </div>
            @endif
        </div>
        </div>
    </section>
@endsection
