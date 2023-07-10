@extends('layouts.main')

@section('container')
    <div class="row m-0">
        <div class="col-xl-4 col-lg-4">
            <div class="about-content-wrapper">
                <div class="page-banner-section p-3 img-bg m-0 
                @if ($data->konfirmasi == 1) bg-success">
                    @else bg-danger"> @endif
                    <div class="banner-content
                    p-2">
                    <h3 class="text-white">STATUS PEMBAYARAN</h3>
                </div>
            </div>
            <div class="p-2">
                <div class="section-title">
                    <h4 class="mb-2 wow fadeInRight" data-wow-delay=".4s">PEMBAYARAN
                        @if ($data->konfirmasi == 1)
                            DIKONFIRMASI
                        @else
                            BELUM DIKONFIRMASI
                        @endif
                    </h4>
                </div>
                <div class="about-content">
                    <p class="mb-25 wow fadeInUp" data-wow-delay=".6s">Harap tunggu sejenak dan cek secara berkala.
                        Hubungi admin jika terdapat masalah</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="about-content-wrapper">
            <div class="page-banner-section p-3 img-bg m-0 bg-success">
                <div class="banner-content p-2">
                    <h3 class="text-white">Informasi Pembayaran</h3>
                </div>
            </div>
            <div class="p-2">
                <div class="section-title">
                    <h4 class="mb-2 wow fadeInRight" data-wow-delay=".4s">Rp. {{ $lapangan->tarif }}</h4>
                </div>
                <div class="about-content">
                    <p class="mb-25 wow fadeInUp" data-wow-delay=".6s">PEMBAYARAN DILAKUKAN MELALUI TRANSFER BANK.
                        PASTIKAN SESUAI NOMINAL PEMBAYARAN DAN DENGAN CATATAN TRANSFER: SPORTKY - PEMBAYARAN LAPANGAN
                    </p>
                    <ul class="list-group-flush">
                        <li class="list-group-item">
                            <h6><strong>BANK BRI</strong></h6>
                        </li>
                        <li class="list-group-item">
                            <h6><strong>NOMOR REKENING&Tab; </strong><u>1234-5678-9012-3456</u></h6>
                        </li>
                        <li class="list-group-item">
                            <h6><strong>ATAS NAMA&Tab; </strong><u>SPORTKY</u></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4">
        <div class="about-content-wrapper">
            <div class="page-banner-section p-3 img-bg m-0 bg-success">
                <div class="banner-content p-2">
                    <h3 class="text-white">Bukti Pembayaran</h3>
                </div>
            </div>
            <div class="p-2">
                @if (is_null($data->bukti))
                    <div class="text-center mt-3">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Masukkan Bukti Pembayaran</label>
                                <input name="bukti" class="form-control" type="file" id="formFile">
                            </div>
                            <button type="submit" class="btn btn-success">Upload</button>
                        </form>
                    </div>
                @else
                    <div class="text-center mt-3">
                        <img src="{{ asset('storage/' . $data->bukti) }}" class="img-fluid img-thumbnail" alt="404"
                            style="width: 50%">
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
