@extends('pelanggan.layout.index')

@section('content')
    <section class="breadcrumb-section section-b-space" style="padding-top: 100px;padding-bottom:100px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white">Package</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Package</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    {{-- Catalog TC --}}
    {{-- <style>
        .heading h2 {
            margin-bottom: 15px;
        }

        /* Garis bawah di bawah judul */
        .heading h2::after {
            content: "";
            display: block;
            width: 200px;
            /* Panjang garis bawah, sesuaikan dengan kebutuhan Anda */
            height: 2px;
            background-color: #4caf50;
            /* Warna garis bawah, sesuaikan dengan desain Anda */
            margin: 10px auto;
        }
    </style> --}}

    <style>
        a {
            text-decoration: none;
        }

        .pricingTable {
            text-align: center;
            background: #fff;
            box-shadow: 0 0 10px #ababab;
            padding-bottom: 40px;
            border-radius: 10px;
            color: #cad0de;
            transform: scale(1);
            transition: all .5s ease 0s
        }

        .pricingTable:hover {
            transform: scale(1.05);
            z-index: 1
        }

        .pricingTable .pricingTable-header {
            padding: 30px 0;
            background: #f5f6f9;
            border-radius: 10px 10px 50% 50%;
            transition: all .5s ease 0s
        }


        /* .pricingTable .pricingTable-header i {
            font-size: 50px;
            color: #858c9a;
            margin-bottom: 10px;
            transition: all .5s ease 0s
        } */

        .pricingTable .price-value {
            /* font-size: 35px; */
            transition: all .5s ease 0s
        }

        .pricingTable .month {
            display: block;
            font-size: 14px;
            color: #cad0de
        }

        .pricingTable:hover .month,
        .pricingTable:hover .price-value,
        .pricingTable:hover .pricingTable-header i {
            color: #fff
        }


        .pricingTable .pricing-content ul {
            list-style: none;
            padding: 0;
            /* margin-bottom: 30px; */
            height:210px
        }

        .pricingTable .pricing-content ul li {
            line-height: 30px;
            color: #a7a8aa;
            font-size: 14px;
        }

        .pricingTable .pricingTable-signup a {
            display: inline-block;
            font-size: 15px;
            color: #fff;
            padding: 10px 35px;
            border-radius: 20px;
            text-transform: uppercase;
            transition: all .3s ease 0s
        }

        .pricingTable.green .heading,
        .pricingTable.green .price-value {
            color: #40c952
        }

        .pricingTable.green .pricingTable-signup a,
        .pricingTable.green:hover .pricingTable-header {
            background: #40c952
        }

        .pricingTable.green .pricingTable-signup a:hover {
            box-shadow: 0 0 10px #40c952
        }

        .pricingTable.blue:hover .price-value,
        .pricingTable.green:hover .price-value,
        .pricingTable.red:hover .price-value {
            color: #fff
        }

        /* @media screen and (max-width:990px) {
            .pricingTable {
                margin: 0 0 20px
            }
        } */
    </style>

    <div class="demo my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5 heading-title">
                    <h2 class="fw-bolder">Meeting Package</h2>
                    <span class="sub-title fs-5">Nikmati paket meeting dengan harga lebih hemat, sekarang juga!</span>
                </div>
                <div class="col-md-4 col-12 mb-md-0 mb-4">
                    <div class="pricingTable green h-100">
                        <div class="pricingTable-header">
                            <div class="price-value fs-2"> Rp. 125.000 <span class="month">PER PAX</span> </div>
                        </div>
                        <h4 class="heading mt-3 fw-semibold">Half Day Meeting</h4>
                        <div class="pricing-content ">
                            <ul>
                                <li><b>Free</b> Screen and Projector</li>
                                <li><b>Free</b> Sound System</li>
                                <li><b>Free</b> Mineral Water</li>
                                <li><b>1x</b> Lunch / Dinner</li>
                                <li><b>1x</b> Coffee Break</li>
                                <li><b>6 Hours</b> Usage</li>
                            </ul>
                        </div>
                        <div class="pricingTable-signup ">
                            <a href="#">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mb-md-0 mb-4">
                    <div class="pricingTable green h-100">
                        <div class="pricingTable-header">
                            <div class="price-value fs-2"> Rp. 175.000 <span class="month">PER PAX</span> </div>
                        </div>
                        <h4 class="heading mt-3 fw-semibold">Full Day Meeting</h4>
                        <div class="pricing-content">
                            <ul>
                                <li><b>Free</b> Screen and Projector</li>
                                <li><b>Free</b> Sound System</li>
                                <li><b>Free</b> Mineral Water</li>
                                <li><b>1x</b> Lunch / Dinner</li>
                                <li><b>2x</b> Coffee Break</li>
                                <li><b>8 Hours</b> Usage</li>
                            </ul>
                        </div>
                        <div class="pricingTable-signup">
                            <a href="#">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mb-md-0 mb-4">
                    <div class="pricingTable green">
                        <div class="pricingTable-header">
                            <div class="price-value fs-2"> Rp. 350.000 <span class="month">PER PAX</span> </div>
                        </div>
                        <h4 class="heading mt-3 fw-semibold">Fullboard Meeting</h4>
                        <div class="pricing-content">
                            <ul>
                                <li><b>Free</b> Screen and Projector</li>
                                <li><b>Free</b> Sound System</li>
                                <li><b>Free</b> Mineral Water</li>
                                <li><b>Free</b> Breakfast, Lunch, & Dinner</li>
                                <li><b>2x</b> Coffee Break</li>
                                <li><b>10 Hours</b> Usage</li>
                                <li><b>Free</b> Room</li>
                            </ul>
                        </div>
                        <div class="pricingTable-signup">
                            <a href="#">Book Now</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    {{-- <div class="row tc-catalog-main d-flex justify-content-center">
        <div class="heading mb-5 text-center">
            <h2 class="fw-bolder">Meeting Package</h2>
            <span class="sub-title fs-5">Nikmati paket meeting dengan harga lebih hemat</span>
        </div>
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bolder">Meeting Package</h2>
            <span class="sub-title fs-5">Nikmati paket meeting dengan harga lebih hemat</span>
        </div>
        <div class="row mb-5 d-flex align-items-center text-center">
            <div class="col-md-4 col-sm-6 col-12 gy-md-0 mt-md-3 mt-5">
                <div class="card border-0 p-2">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Convention Hall</h5>
                        <p class="card-text">
                            Ruang pertemuan dengan kapasitas 200 orang.
                        </p>
                        <a href="#" class="btn btn-success w-100">Lihat Detail</a>
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
    </div> --}}

    {{-- End Catalog TC --}}
@endsection
