@extends('layouts.no_header')

@section('container')
    <a href="/"><button class="btn btn-success"><i class="bi bi-arrow-left"></i></button></a>
    <div class="row align-items-center">
        <div class="col-xl-7 col-lg-6">
            <div class="hero-content-wrapper">

                <h1 class="wow fadeInDown" data-wow-delay=".2s">Sportky</h1>
                <h3 class="wow fadeInDown" data-wow-delay=".2s">Portal Penyewaan Lapangan Olahraga</h3>
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="form-group my-4" id="signup" class="fade">
                    <form action="/special_signup" method="POST" id="signup-form">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="name@example.com" required value="{{ old('user') }}" autofocus>
                            <label for="floatingInput">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="user" type="text"
                                class="form-control @error('user')
                            is-invalid
                            @enderror"
                                id="user" placeholder="name@example.com" required value="{{ old('user') }}">
                            <label for="floatingInput">User</label>
                            <small>Note: Kombinasi huruf kecil, tanpa spasi</small>
                            @error('user')
                                <script>
                                    alert('Gunakan user yang lain atau pastikan user kombinasi huruf kecil, tanpa spasi')
                                </script>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <select name="level" id="level" class="form-select mt-2" aria-label="Default select example">
                            <option selected value="">Pilih level user</option>
                            <option value="admin">Admin</option>
                            <option value="lapangan">Pemilik Lapangan</option>
                            <option value="sewa">Penyewa Lapangan</option>
                        </select>
                        <button type="submit" class="btn btn-success mt-2 w-100">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-6">
            <div class="hero-img m-2">
                <div class="d-inline-block hero-img-right">
                    <img src="{{ url('') }}/assets/img/hero/futsal_index.jpg" alt=""
                        class="image w-100 wow fadeInRight" data-wow-delay=".5s">
                    <img src="{{ url('') }}/assets/img/hero/dots.shape.svg" alt="" class="dot-shape m-3">
                </div>
            </div>
        </div>
    </div>
@endsection
