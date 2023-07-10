@extends('layouts.main')

@section('container')
    <section id="pricing" class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 mx-auto">
                    <div class="section-title text-center mb-60">
                        <span class="wow fadeInDown" data-wow-delay=".2s">Sportky</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Jadwal Lapangan</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">At vero eos et accusamus et iusto odio
                            dignissimos ducimus quiblanditiis praesentium</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="pricing-btn text-center wow fadeInUp" data-wow-delay=".3s">
                        <ul class="nav justify-content-center mb-90" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="pills-1-tab" data-bs-toggle="pill" href="#pills-1" role="tab"
                                    aria-controls="pills-1" aria-selected="true">Futsal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-2-tab" data-bs-toggle="pill" href="#pills-2"
                                    role="tab" aria-controls="pills-2" aria-selected="false">Badminton</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-1" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('partials.list-futsal')
                </div>
                <!-- PILLS2 -->
                <div class="tab-pane fade show active" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                    @include('partials.list-badminton')
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
