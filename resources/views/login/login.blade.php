@extends('layouts.no_header')

@section('container')
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
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                        <strong>{{ session('loginError') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="form-group my-4" id="login" class="fade">
                    <form action="/login" method="POST" id="login-form">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="user" class="form-control" id="floatingInput"
                                placeholder="name@example.com" autofocus required>
                            <label for="floatingInput">User</label>
                        </div>
                        <div class="form-floating">
                            <input name="password" type="password" class="form-control" id="floatingPassword"
                                placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-success mt-2 w-100">Masuk</button>
                    </form>
                    <div class="w-100">
                        <button class="w-100 btn" id="toggleSignup"><u>Buat Akun</u></button>
                    </div>
                </div>

                <div class="form-group my-4" id="signup" style="display: none" class="fade">
                    <form action="/signup" method="POST" id="signup-form">
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
                        <button type="submit" class="btn btn-success mt-2 w-100">Daftar</button>
                    </form>
                    <button class="w-100 btn" id="toggleLogin"><u>Login</u></button>
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
