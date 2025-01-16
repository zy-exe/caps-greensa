@extends('pelanggan.layout.index')

{{-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script> --}}

@section('content')
    {{-- HERO SECTION --}}
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
                    <h1 class="text-white">Orders Status</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Orders Status</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}

    <style>
        .keterangan {
            font-size: 12px
        }

        /*common styling end*/
        .member_card_style {
            position: relative;
            box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 5px;
            background: #fff;
            transition: 0.5s;
            margin: 20px 0;
        }

        .member_card_style img {
            border-radius: 5px;
            transition: all 0.3s;
        }

        .member_card_style:hover {
            transform: translateY(-10px);
        }

        .member-info {
            padding-left: 30px;
            display: inline-block;
        }

        .member-info h4 {
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 20px;
            color: #fcc101;
            text-transform: uppercase;
        }

        .member-info .social {
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .member-info .social a {
            transition: ease-in-out 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50px;
            width: 32px;
            height: 32px;
            background: #fff3d5;
            color: #ffb700;
            text-decoration: none;
        }

        .member-info .social a i {
            font-size: 16px;
            margin: 0 2px;
        }

        .member-info .social a:hover {
            background: #ffb700;
            color: #fff;
        }

        .member-info .social a+a {
            margin-left: 8px;
        }

        .member-info span {
            display: block;
            font-size: 15px;
            padding-bottom: 10px;
            position: relative;
            font-weight: 500;
        }

        .member-info span::after {
            content: "";
            position: absolute;
            display: block;
            width: 50px;
            height: 1px;
            background: #bfe0fd;
            bottom: 0;
            left: 0;
        }

        /*custom tab style 3*/
        .custom_tab_style3.nav-tabs {
            border-bottom: 1px solid transparent;
            display: flex;
            justify-content: center;
            margin-bottom: 50px;
        }

        .custom_tab_style3.nav-tabs .nav-link {
            padding: 5px 20px;
            margin: 0 10px;
            border-radius: 0.25rem;
            color: #198754
        }

        .custom_tab_style3 .nav-item.show .nav-link,
        .custom_tab_style3 .nav-link.active {
            color: #fff;
            background-color: #198754;
            border-color: transparent;
        }

        .custom_tab_style3 .nav-link:focus,
        .custom_tab_style3 .nav-link:hover {
            color: #fff;
            background-color: #198754;
            border-color: transparent;
        }
    </style>

    <div class="container py-5 custom_tab_style1_outer">
        <div class="row">
            <div class="callout callout-info text-center">
                    Pembayaran <span class="fw-bolder">KOMPLIMEN</span> hanya digunakan untuk pengguna <span class="fw-bold">UINSA</span> 
                    <br>
                    Pembayaran <span class="fw-bolder">REGULER</span> digunakan untuk pengguna <span class="fw-bold">UMUM</span>

            </div>
            <div class="col-md-12">
                <ul class="nav nav-tabs custom_tab_style3 my-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active fw-medium d-flex align-items-center gap-2 justify-content-center" style="width: 10rem" id="home-tab" data-bs-toggle="tab" data-bs-target="#Profile3" type="button" role="tab" aria-controls="home" aria-selected="true">
                        <i class="fa-regular fa-id-badge"></i> Komplimen</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link fw-medium d-flex align-items-center gap-2 justify-content-center" style="width: 10rem" id="profile-tab" data-bs-toggle="tab" data-bs-target="#Gallery3" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        <i class="fa-regular fa-user"></i> Reguler</button>
                    </li>
                </ul>
                
                
                <div class="tab-content" id="myTabContent">
                    {{-- TAB KOMPLIMEN --}}
                    <div class="tab-pane fade show active" id="Profile3" role="tabpanel" aria-labelledby="home-tab">
                        <div class="member_card_style">
                            <div class="compliment">
                                <h2 class="text-center fw-bold text-uppercase">Form Komplimen</h2>
                                <div class="row gy-4 mt-5 ">
                                    @if ($fromCart == true)
                                        <form action="/checkout-komplimen/{{ $cart->id }}" method="POST" class="row m-0 p-0 gap-2" enctype="multipart/form-data"> @csrf
                                            <div class="col-md-6">
                                                <div class="col-12 mb-3">
                                                    <label class="labels">Nama Kegiatan <span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Masukkan nama kegiatan" maxlength="30" required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="labels">SK Kegiatan/Undangan <span class="text-danger">*</span></label>
                                                    <input type="file" name="surat" accept=".pdf" class="form-control" placeholder="Upload file SPJ" required>
                                                </div>
                                            </div>

                                            <div class="col-md-5 summary">
                                                <div>
                                                    <h5 class="fw-bold mb-0">DETAIL PEMESANAN</h5>
                                                </div>
                                                <hr class="my-0 mt-2 mb-3">
                                                <div class="col-12 fw-semi-bold mb-3 text-uppercase">List Ruang</div>

                                                @foreach ($cart->items as $item)
                                                    <div class="row mb-2">
                                                        <div class="col-6" text-transform:uppercase">
                                                            {{ $item->train->nama }}<br>
                                                            <span class="keterangan">{{ $item->layout }}</span><br>
                                                            <span class="keterangan">{{ $item->checkin }}</span>
                                                        </div>
                                                        <div class="col-6 text-end price"> Rp
                                                            {{ number_format($item->harga, 0, ',', '.') }}
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div class="row mt-4 "
                                                    style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                                    <div class="col-6">TOTAL HARGA</div>
                                                    <div class="col-6 text-end">Rp
                                                        {{ number_format($totalHarga, 0, ',', '.') }}
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <input class="btn btn-success text-center w-100" type="submit" value="Checkout">
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="/checkout-komplimen-langsung" method="POST" class="row m-0 p-0 gap-2" enctype="multipart/form-data"> @csrf
                                            <input type="hidden" name="item" value="{{ json_encode($item) }}">
                                            <div class="col-md-6">
                                                <div class="col-12 mb-3">
                                                    <label class="labels">Nama Kegiatan <span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Masukkan nama kegiatan" maxlength="30" required>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="labels">SK Kegiatan/Undangan <span class="text-danger">*</span></label>
                                                    <input type="file" name="surat" accept=".pdf" class="form-control" placeholder="Upload file SPJ" required>
                                                </div>
                                            </div>

                                            <div class="col-md-5 summary">
                                                <div>
                                                    <h5 class="fw-bold mb-0">DETAIL PEMESANAN</h5>
                                                </div>
                                                <hr class="my-0 mt-1 mb-3">
                                                <div class="col-12 fw-semi-bold mb-3 text-uppercase">List Ruang</div>

                                                <div class="row mb-2">
                                                    <div class="col-6" text-transform:uppercase">
                                                        {{ $train->nama }}<br>
                                                        <span class="keterangan">{{ $item['layout'] }}</span><br>
                                                        <span class="keterangan">{{ $item['checkin'] }}</span>
                                                    </div>
                                                    <div class="col-6 text-end price"> Rp
                                                        {{ number_format($item['harga'], 0, ',', '.') }}
                                                    </div>
                                                </div>

                                                <div class="row mt-4 " style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                                    <div class="col-6">TOTAL HARGA</div>
                                                    <div class="col-6 text-end">Rp
                                                        {{ number_format($item['harga'], 0, ',', '.') }}
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <input class="btn btn-success text-center w-100" type="submit" value="Checkout">
                                                </div>
                                            </div>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TAB REGULER --}}
                    <div class="tab-pane fade show" id="Gallery3" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="member_card_style">
                            <div class="reguler">
                                <h2 class="text-center fw-bold text-uppercase">FORM REGULER</h2>
                                <div class="row gy-4 mt-5 ">
                                    @if ($fromCart == true)
                                        <form action="/checkout-reguler/{{ $cart->id }}" method="POST" class="row m-0 p-0 gap-2"> @csrf
                                            <div class="col-md-6">
                                                <div class="col-12 mb-3">
                                                    <label class="labels">Nama Kegiatan <span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Masukkan nama kegiatan" name="namaKegiatan" id=kegiatan maxlength="30" required>
                                                </div>
                                            </div>

                                            <div class="col-md-5 summary">
                                                <div>
                                                    <h5 class="fw-bold mb-0">DETAIL PEMESANAN</h5>
                                                </div>
                                                <hr class="my-0 mt-2 mb-3">
                                                <div class="col-12 fw-semi-bold mb-3 text-uppercase">List Ruang</div>

                                                @foreach ($cart->items as $item)
                                                    <div class="row mb-2">
                                                        <div class="col-6" text-transform:uppercase">
                                                            {{ $item->train->nama }}<br>
                                                            <span class="keterangan">{{ $item->layout }}</span><br>
                                                            <span class="keterangan">{{ $item->checkin }}</span>
                                                        </div>
                                                        <div class="col-6 text-end price"> Rp
                                                            {{ number_format($item->harga, 0, ',', '.') }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row mt-4 "
                                                    style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                                    <div class="col-6">TOTAL HARGA</div>
                                                    <div class="col-6 text-end">Rp
                                                        {{ number_format($totalHarga, 0, ',', '.') }}
                                                    </div>
                                                </div>

                                                <div class="row"
                                                    style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                                    <div class="col-12">PILIH REKENING</div>
                                                    <div class="col-12 mt-3">
                                                        {{-- <div class="form-check ms-3 mb-4 bank-bsi">
                                                            <input type="radio" class="form-check-input" name="metode_pembayaran" id="flexRadioDefault1" value="BSI" checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                <img src="{{ asset('assets/images/BSI.png') }}" alt="BSI Logo" style="width: 23%; margin-top:-0.2rem">
                                                            </label>
                                                        </div> --}}
                                                        <div class="form-check ms-3 mb-4 bank-btn">
                                                            <input type="radio" class="form-check-input" name="metode_pembayaran" id="flexRadioDefault2" value="BTN" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                <img src="{{ asset('assets/images/BTN.png') }}" alt="BTN Logo" style="width: 30%;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <input class="btn btn-success text-center w-100" id="pay-button" type="submit" value="Checkout">
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="/checkout-reguler-langsung" method="POST" class="row m-0 p-0 gap-2"> @csrf
                                            <input type="hidden" name="item" value="{{ json_encode($item) }}">
                                            <div class="col-md-6">
                                                <div class="col-12 mb-3">
                                                    <label class="labels">Nama Kegiatan <span class="text-danger">*</span></label>
                                                    <input type="text" name="nama_kegiatan"class="form-control" placeholder="Masukkan nama kegiatan" name="namaKegiatan" id=kegiatan maxlength="30" required>
                                                </div>
                                            </div>

                                            <div class="col-md-5 summary">
                                                <div>
                                                    <h5 class="fw-bold mb-0">DETAIL PEMESANAN</h5>
                                                </div>
                                                <hr class="my-0 mt-2 mb-3">
                                                <div class="col-12 fw-semi-bold mb-3 text-uppercase">List Ruang</div>

                                                <div class="row mb-2">
                                                    <div class="col-6" text-transform:uppercase">
                                                        {{ $train->nama }}<br>
                                                        <span class="keterangan">{{ $item['layout'] }}</span><br>
                                                        <span class="keterangan">{{ $item['checkin'] }}</span>
                                                    </div>
                                                    <div class="col-6 text-end price"> Rp
                                                        {{ number_format($item['harga'], 0, ',', '.') }}
                                                    </div>
                                                </div>

                                                <div class="row mt-4 " style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                                    <div class="col-6">TOTAL HARGA</div>
                                                    <div class="col-6 text-end" id="totalPrice">Rp
                                                        {{ number_format($item['harga'], 0, ',', '.') }}</div>
                                                </div>

                                                <div class="row"
                                                    style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                                    <div class="col-12">PILIH REKENING</div>
                                                    <div class="col-12 mt-3">
                                                        {{-- <div class="form-check ms-3 mb-4 bank-bsi">
                                                            <input class="form-check-input" type="radio" name="metode_pembayaran" id="flexRadioDefault1" value="BSI" checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                <img src="{{ asset('assets/images/BSI.png') }}" alt="BSI Logo" style="width: 23%; margin-top:-0.2rem">
                                                            </label>
                                                        </div> --}}
                                                        <div class="form-check ms-3 mb-4 bank-btn">
                                                            <input class="form-check-input" type="radio" name="metode_pembayaran" id="flexRadioDefault2" value="BTN" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                <img src="{{ asset('assets/images/BTN.png') }}" alt="BTN Logo" style="width: 30%;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <input class="btn btn-success text-center w-100" id="pay-button" type="submit" value="Checkout">
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- END CHECK-OUT 1 --}}
    </div>

@endsection
