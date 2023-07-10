<div class="container-fluid w-100 mr-2 ml-2">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand " href="{{ url('') }}">
                    <h3 class="text-success">SportKy</h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                    <ul id="nav" class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="page-scroll" href="{{ url('') }}">Dasbor</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="{{ url('') }}/futsal">Futsal</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="{{ url('') }}/badminton">Badminton</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="{{ url('') }}/pesanan">Pemesanan</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="page-scroll" href="contact.html">Pengumuman</a>
                        </li>
                        <li class="nav-item">
                            <a class="page-scroll" href="contact.html">Kontak</a>
                        </li>
                        <li class="nav-item">
                        </li> --}}
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="button" class="btn btn-outline-success my-auto mt-3" disabled>
                                <i class="bi bi-person mr-2"></i>{{ auth()->user()->user }}</button>
                            <button type="submit" class="btn btn-outline-danger my-auto mt-3"><i
                                    class="bi bi-box-arrow-right mx-2"></i>Keluar</button>
                        </form>
                    </ul>
                </div> <!-- navbar collapse -->
            </nav> <!-- navbar -->
        </div>
    </div> <!-- row -->
</div> <!-- container -->
