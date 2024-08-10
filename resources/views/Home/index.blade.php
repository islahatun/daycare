@extends('layouts.main')


@section('style')
<style>
    .fixed-size-image {
            width: 500px; /* Ganti dengan ukuran lebar yang diinginkan */
            height: 400px; /* Ganti dengan ukuran tinggi yang diinginkan */
            object-fit: cover; /* Memastikan gambar tetap proporsional */
        }
</style>
@endsection

@section('carousel')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{!! asset('assets-kider/img/carousel-1.jpg') !!}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">The Best Daycare For
                                    Your Child</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Membentuk anak anda dengan positif sedini mungkin merupakan hal terbaik yang dapat anda berikan bagi masa depan mreka</p>
                                <a href=""
                                    class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Activity</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{!! asset('assets-kider/img/carousel-2.jpg') !!}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">Make A Brighter Future For Your
                                    Child</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Membentuk anak anda dengan positif sedini mungkin merupakan hal terbaik yang dapat anda berikan bagi masa depan mreka.</p>
                                <a href=""
                                    class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Actifity</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
@endsection

@section('container')
    <!-- Facilities Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Fasilitas</h1>
                <p>Puspaga memberikan fasilitas anak yang dapat melatih motorik dan sosial anak</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="facility-item">
                        <div class="facility-icon bg-primary">
                            <span class="bg-primary"></span>
                            <i class="fa fa-home fa-3x text-warning"></i>
                            <span class="bg-primary"></span>
                        </div>
                        <div class="facility-text bg-primary">
                            <h3 class="text-primary mb-3">Gedung Sekolah</h3>
                            <img src="{!! asset('assets/img/tampak-depan.jpg') !!}" alt="">
                            <p class="mb-0">Gedung sekolah yang bersih dan nyaman untuk anak-anak </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="facility-item">
                        <div class="facility-icon bg-primary">
                            <span class="bg-primary"></span>
                            <i class="fa fa-home fa-3x text-warning"></i>
                            <span class="bg-primary"></span>
                        </div>
                        <div class="facility-text bg-primary">
                            <h3 class="text-primary mb-3">Gedung Sekolah</h3>
                            <img src="{!! asset('assets/img/tampak-samping.jpg') !!}" alt="">
                            <p class="mb-0">Memiliki lapangan sekolah yang luas untuk orang tua mengantarkan anak </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="facility-item">
                        <div class="facility-icon bg-success">
                            <span class="bg-success"></span>
                            <i class="fa fa-futbol fa-3x text-success"></i>
                            <span class="bg-success"></span>
                        </div>
                        <div class="facility-text bg-success">
                            <h3 class="text-success mb-3">Taman bermain</h3>
                            <img src="{!! asset('assets/img/playground.jpg') !!}" alt="" height="200px">
                            <p class="mb-0">disediakan taman bermain untuk anak-anak melakukan aktifitas autdoor untuk
                                melatih gerakan dan motorik anak</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="facility-item">
                        <div class="facility-icon bg-info">
                            <span class="bg-info"></span>
                            <i class="fa fa-chalkboard-teacher fa-3x text-info"></i>
                            <span class="bg-info"></span>
                        </div>
                        <div class="facility-text bg-info">
                            <h3 class="text-info mb-3">Aktifitas Indoor</h3>
                            <img src="{!! asset('assets/img/inside.jpg') !!}" alt="" height="200px">
                            <p class="mb-0">Anak anak melakukan aktifitas indor untuk mengasah kemampuan berpikir</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities End -->


    <!-- Classes Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Gallery </h1>
            </div>
            <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/playground.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/inside.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/tampak-depan.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/tampak-dekat.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/1.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/2.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/3.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded float-start fixed-size-image w-75 mx-auto p-3">
                                <img class="img-fluid rounded float-start fixed-size-image" src="{!! asset('assets/img/4.jpg') !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href=""></a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </div>
    <!-- Classes End -->



    <!-- Classes Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Aktifitas </h1>
            </div>
            <div class="row g-4">
                @foreach ($activity as $a)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3">
                                <img class="img-fluid rounded-circle" src="{!! asset('storage/' . $a->image) !!}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5">
                                <a class="d-block text-center h3 mt-3 mb-4" href="">{{ $a->title }}</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-justify">
                                        <div class="ms-3">
                                            <p>{{ $a->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-1">
                                    <div class="col-4">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Waktu</h6>
                                            <small>{{ date('d-M-Y', strtotime($a->date)) }}</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Time:</h6>
                                            <small>9-10 AM</small>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Capacity:</h6>
                                            <small>30 Kids</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Classes End -->




    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Guru</h1>
                {{-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit
                        eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> --}}
            </div>
            @foreach ($teacher as $t)
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="{!! asset('storage/' . $t->image_teacher) !!}" alt="">
                            <div >
                                <h3>{{ $t->name_teacher }}</h3>
                                <p>{{ $t->graduate_of }}- {{ $t->major }}</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    {{-- <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Say!</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-5">
                        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{!! asset('assets-kider/img/testimonial-1.jpg') !!}" style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">Client Name</h3>
                                <span>Profession</span>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-5">
                        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{!! asset('assets-kider/img/testimonial-2.jpg') !!}" style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">Client Name</h3>
                                <span>Profession</span>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-5">
                        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="{!! asset('assets-kider/img/testimonial-3.jpg') !!}" style="width: 90px; height: 90px;">
                            <div class="ps-3">
                                <h3 class="mb-1">Client Name</h3>
                                <span>Profession</span>
                            </div>
                            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kawasan Pusat Pemetintahan Provinsi Banten</p>

                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Photo Gallery Aactivity</h3>
                    <div class="row g-2 pt-2">
                        @foreach ($activity as $a)
                            <div class="col-4">
                                <img class="img-fluid rounded bg-light p-1" src="{!! asset('storage/' . $a->image) !!}"
                                    alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Newsletter</h3>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- Footer End -->
@endsection
