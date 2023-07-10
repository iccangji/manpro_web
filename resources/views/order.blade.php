@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="row mx-2">
            <div class=" alert alert-success alert-dismissible fade show" role="alert">
                {{-- Selamat datang, {{ $name }}! --}}
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    <div class="col-xl-6 col-lg-7 col-md-9 mx-auto">
        <div class="section-title text-center mb-55">
            <h2><span class="wow fadeInDown" data-wow-delay=".2s">Daftar Pemesanan</span></h2>
            {{-- <h4 class="wow fadeInUp" data-wow-delay=".4s"></h4> --}}
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <table class="table">
                <tr>
                    <th>
                        #
                    </th>
                    <th>Olahraga</th>
                    <th>
                        Lapangan
                    </th>
                    @if ($level != 'sewa')
                        <th>
                            User
                        </th>
                    @endif
                    <th class="">
                        Aksi
                    </th>
                </tr>
                @foreach ($order as $o => $n)
                    <tr
                        class="
                    @if ($n->konfirmasi == 1) table-success
                    @else
                    table-danger @endif
                    ">
                        <td>{{ $o + 1 }}</td>
                        <td>{{ $n->olahraga }}</td>
                        <td>
                            <h5>
                                {{ $nama_lapangan[$o] }}
                            </h5>
                            <span>
                                Lapangan {{ $n->indeks }}
                            </span>
                            <p>
                                <small>{{ $n->tanggal . ' ' . $n->waktu }}</small>
                            </p>
                            <small><strong>
                                    @if ($n->konfirmasi == 1)
                                        DIKONFIRMASI
                                    @else
                                        BELUM DIKONFIRMASI
                                    @endif
                                </strong></small>
                        </td>
                        @if ($level != 'sewa')
                            <td>
                                {{ $n->pemesan }}
                            </td>
                            {{-- <button type="button" class="btn btn-outline-success">
                                Success</button> --}}
                            <td>
                                @if ($n->konfirmasi == 0)
                                    <a href="{{ url()->current() . '/' . $n->id . '/konfirmasi' }}">
                                        <button type="button" class="btn btn-outline-dark my-2">KONFIRMASI</button>
                                    </a>
                                    @if (is_null($n->bukti))
                                        <button type="button" class="btn btn-outline-dark my-2" disabled>Bukti pembayaran
                                            belum
                                            ada</button>
                                    @else
                                        <a href="{{ asset('storage/' . $n->bukti) }}" target="_blank"><button
                                                class="btn btn-dark">Cek Bukti
                                                Pembayaran</button></a>
                                    @endif
                                @endif
                            </td>
                        @else
                            <td>
                                <a href="/pesanan/{{ $n->id . '/cek-konfirmasi' }}">
                                    <button type="button" class="btn btn-outline-dark">Cek Pembayaran</button>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
