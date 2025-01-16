@extends('pelanggan.layout.index')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/images/hom2-banner-1.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Berkegiatan Dan Istirahat Dengan Nyaman.
                            </h1>
                            <a href="/training-center" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">OUR ROOMS</a>
                            <a href="/about" class="btn btn-light py-md-3 px-md-5 animated slideInRight">ABOUT US</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/images/hom2-banner-3.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Berkegiatan Dan Istirahat Dengan Nyaman.
                            </h1>
                            <a href="/training-center" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">OUR ROOMS</a>
                            <a href="/about" class="btn btn-light py-md-3 px-md-5 animated slideInRight">ABOUT US</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/images/hom2-banner-4.png')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Berkegiatan Dan Istirahat Dengan Nyaman.
                            </h1>
                            <a href="/training-center" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">OUR ROOMS</a>
                            <a href="/about" class="btn btn-light py-md-3 px-md-5 animated slideInRight">ABOUT US</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Search Start -->
    <div class="container-fluid booking booking-2 pb-5 wow animated fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow rounded" style="padding: 35px;">

                <form action="/training-center" method="POST">
                    @csrf

                    <div class="row g-2">
                        <div class="col-md-12">
                            <div class="row g-2">

                                <div class="col-md-3">
                                    <div class="date form-floating " id="date1" data-target-input="nearest">
                                        <input type="date" name="dateIn" class="form-control" id="check-in" placeholder="Check in" data-target="#date1"
                                            value="{{ isset($_POST['dateIn']) ? $_POST['dateIn'] : $currentDate->format('Y-m-d') }}"
                                            min="{{ $currentDate->format('Y-m-d') }}" />
                                        <label class="labelBook" for="check-in">Check-in</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="hari form-floating " id="hari" data-target-input="nearest">
                                        <input type="number" name="lama" class="form-control" id="hari"
                                            placeholder="Lama Hari" value="{{ isset($_POST['lama']) ? $_POST['lama'] : 1 }}" data-target="#date2" min="1"
                                            max="999" />
                                        <label class="labelBook" for="hari">Lama Hari</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="peserta form-floating" name="peserta" id="peserta"
                                        data-target-input="nearest">
                                        <input type="number" name="peserta" class="form-control" id="peserta-cek"
                                            placeholder="Jumlah Peserta" data-target="#date2" min="0" value="{{ isset($_POST['peserta']) ? $_POST['peserta'] : 0 }}" />
                                        <label class="labelBook" for="peserta" style="color: #6c757d;">Jumlah
                                            Peserta</label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <button class="btn btn-success w-100 h-100" type="submit">Cek Ketersediaan</button>
                                </div>

                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Search End -->

    {{-- TC Desc --}}
    <section id="tc-content">
        <div class="container container-fluid" style="background-color: #fafafa">
            <div class="row d-flex align-items-center mt-5 mb-5 tc-desc">
                <div class="col-md-6 col-12">
                    <div class="content-text flex-column">
                        <h2 class="fw-bolder mb-4 text-md-start text-center">Training Center</h2>
                        <p  class="text-md-start text-center">Training center merupakan ruangan yang disediakan untuk pertemuan. Ada banyak
                            pilihan ruangan
                            yang bisa anda gunakan untuk berbagai kegiatan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-12 text-md-end text-start">
                    <img src="{{ asset('assets/images/tcmain.jpg') }}" style="width: 70%; border-radius: 15px;"
                        class="justify-content-center ms-5" alt="">
                </div>
            </div>
            <hr>

            {{-- Catalog TC --}}
            <div class="row tc-catalog-main d-flex justify-content-center">
                <div class="col-12 text-center mb-4">
                    <h2 class="fw-bolder">Training Center</h2>
                    <span class="sub-title fs-5">Berkegiatan bersama-sama dengan nyaman</span>
                </div>
                <div class="row mb-5 d-flex align-items-center text-center">
                    <div class="col-md-4 col-sm-6 col-12 gy-md-0 mt-md-3 mt-5">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/img_ruang.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Ruang Reguler</h5>
                                <p class="card-text">
                                    Ruang pertemuan dengan kapasitas 40 orang.
                                </p>
                                <a href="/detail/1" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4 col-sm-6 col-12 gy-md-0 mt-md-3 mt-5">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/img_ujianterbuka.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Ujian Terbuka</h5>
                                <p class="card-text">
                                    Ruang pertemuan dengan kapasitas 60 orang.
                                </p>
                                <a href="/detail/13" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
            
                    <div class="col-md-4 col-sm-6 col-12 gy-md-0 mt-md-3 mt-5">
                        <div class="card border-0 p-2">
                            <img src="{{ asset('assets/images/img_hall.jpg') }}" class="card-img" alt="card1" />
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">Convention Hall</h5>
                                <p class="card-text">
                                    Ruang pertemuan dengan kapasitas 200 orang.
                                </p>
                                <a href="/detail/15" class="btn btn-success w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-12">
                        <a href="/training-center">
                            <button class="btn btn-outline-success w-100 fs-5">Lihat Selengkapnya</button>
                        </a>
                    </div>
                </div>
            </div>
            {{-- End Catalog TC --}}

    </section>
    {{-- Akhir TC Desc --}}

<x-notify::notify />
@notifyJs
    
@endsection
