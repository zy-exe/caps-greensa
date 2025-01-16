@extends('pelanggan.layout.index')
@php
    $afterOrder = session('afterOrder');
@endphp

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>

    {{-- HERO SETION --}}
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
    {{-- HERO SECTION --}}

    {{-- ORDER STATUS --}}
    <div class="container my-5">
        <div class="row header-table border-top border-bottom d-md-flex d-none align-items-center py-3">

            {{-- HEAD COLUMN --}}
            <div class="col-8 ">
                <p class="fw-bold m-0 ">PESANAN</p>
            </div>
            <div class="col-2 text-center">
                <p class="fw-bold m-0 text-center">INVOICE</p>
            </div>
            <div class="col-2 text-center">
                <p class="fw-bold m-0 text-center">LAINNYA</p>
            </div>
            {{-- END HEAD COLUMN --}}

        </div>
        @if ($orders->isEmpty())
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-12 text-center">
                        <span>Tidak ada pesanan</span>
                    </div>
                </div>
            </div>
        @else
            @foreach ($orders as $index => $order)
                <style>
                    .accordion-button {
                        z-index: 0 !important;
                    }
                </style>
                <div class="row border-bottom bg-white">
                    <div class="col-md-8 col-12 p-0">
                        <div class="accordion border border-0 border-radius-0"
                            id="accordionPanelsStayOpenExample{{ $index }}">
                            <div
                                class="accordion-item border border-0 bg-transparent>
                                <h2 class="accordion-header">
                                <button class="accordion-button border border-0 border-radius-0 text-uppercase fw-bolder"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne{{ $index }}" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne{{ $index }}">
                                    {{ $order->nama_kegiatan }}
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne{{ $index }}"
                                    class="accordion-collapse collapse show">
                                    <div class="accordion-body border border-0 ">
                                        <div
                                            class="row header-table border-top border-bottom d-md-flex d-none align-items-center py-3">
                                            <div class="col-md-3 col-12 gambar">
                                                <p class="fw-bold m-0 text-center">GAMBAR</p>
                                            </div>

                                            <div class="col-md-3 col-12 keterangan-ruang mt-md-0 mt-3">
                                                <p class="fw-bold m-0 text-center">RUANG</p>
                                            </div>

                                            <div class="col-md-3 col-12  harga text-md-center text-start">
                                                <p class="fw-bold m-0 text-center">HARGA</p>
                                            </div>

                                            <div class="col-md-3 col-12 text-end">
                                                <p class="fw-bold m-0 text-center">STATUS</p>
                                            </div>
                                        </div>

                                        <div class="w-100">
                                            @foreach ($order->items as $item)
                                                <div class="row d-flex align-items-center p-0 py-md-4 py-2">
                                                    <div class="col-md-3 col-12 gambar text-center">
                                                        <img src="{{ asset('/storage/posts/' . $item->train->images()->where('konten', 'utama')->value('gambar')) }}"
                                                            class="img-fluid rounded" alt="training-center">
                                                    </div>
                                                    <div class="col-md-3 col-12 keterangan-ruang mt-md-0 mt-3 text-center ">
                                                        <a class=" text-decoration-none text-success fw-bold"
                                                            style="text-transform:uppercase" href="#">
                                                            {{ $item->train->nama }}
                                                        </a>
                                                        <div class="row d-flex align-items-center mb-md-0 mb-2">
                                                            <div class="col-12 p-md-0 text-muted keterangan">
                                                                {{ $item->layout }}</div>
                                                            <div class="col-12 p-md-0 text-muted keterangan ">
                                                                {{ date('d-m-Y', strtotime($item->checkin)) }}</div>
                                                            <div class="col-12 p-md-0 text-muted keterangan ">
                                                                {{ $item->lama }} hari</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12 harga text-center ">
                                                        <p class="m-0 text-success fw-bold">
                                                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3 col-12 text-muted text-center m-0">
                                                        @if ($item->status === "Accepted")
                                                            <label class="text-success fw-bold">{{ $item->status }}</label>@endif
                                                        @if ($item->status === "Rejected")
                                                            <label class="text-danger fw-bold">{{ $item->status }}</label>@endif
                                                        @if ($item->status === "Pending")
                                                            <label class="text-secondary fw-bold">{{ $item->status }}</label>@endif
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12 d-flex align-items-center justify-content-center bg-white m-md-0 m-2 ">

                        {{-- Check if any item has 'Pending' status --}}
                        @php
                            $hasPendingStatus = $order->items->contains('status', 'Pending');
                        @endphp

                        {{-- jika tidak pending, show invoice --}}
                        @if (!$hasPendingStatus)
                            <a href="/invoice-show/{{ $order->id }}" target="_blank"
                                class="btn btn-success w-75">Invoice
                            </a>

                            {{-- else, show 'Pesanan masih diproses oleh admin' --}}
                        @else
                            <a href="/" class="btn btn-success w-75" data-bs-toggle="modal"
                                data-bs-target="#modalPending">Invoice</a>
                        @endif

                        {{-- modal jika order pending --}}
                        <div class="modal fade" id="modalPending" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> -->
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <!-- Booking Start -->
                                        <div class="container-xxl py-5">
                                            <div class="container">

                                                <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                                                    <h6 class="section-title text-center text-dark text-uppercase">
                                                        Pesanan ini masih diproses oleh Admin
                                                    </h6>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="row g-3">
                                                        <div class="col-12">
                                                            <button class="btn btn-success w-100 py-3"
                                                                data-bs-dismiss="modal" type="button">Kembali</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- modal UINSA Food --}}
                        <div class="modal fade" id="modalUinsaFood" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" id="uinsaFood">
                                <div class="modal-content" style="position: relative; background: url(assets/images/uinsafood.png) no-repeat center center; background-size: cover;">
                                    {{-- <div class="modal-overlay"></div> --}}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 text-end">
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="col-12 container-xxl py-5">
                                                <div class="container">
                                                    <div class="text-center wow fadeInUp mt-4 mb-4" data-wow-delay="0.1s" style="">
                                                        <h2
                                                            class="section-title text-center text-white fw-bold">
                                                            Pastikan Acara Anda Tercatat dalam Kenangan dengan Setiap Hidangan.
                                                            Percayakan Catering Anda pada <br> 
                                                            UINSA Food!
                                                        </h2>
                                                    </div>
    
                                                    <h4 class="fw-semibold text-white text-center mb-2 text-uppercase">Order Sekarang Juga!</h4>
                                                    <div class="col-12 d-flex justify-content-center mb-3">
                                                        <a href="https://food.uinsa.ac.id/" class="btn btn-success w-50 py-2 d-flex align-items-center justify-content-center fs-5 fw-semibold"><i class="fa-solid fa-utensils me-2 fs-5"></i> UINSA Food</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        {{-- Akhir Modal UINS Food --}}

                    </div>

                    <div class="col-md-2 col-12 d-flex align-items-center justify-content-center bg-white m-md-0 m-2 ">

                        {{-- jika order reguler --}}
                        @if ($order->surat === null)
                            {{-- jika pending --}}
                            @if (
                                $order->items->every(function ($item) {
                                    return $item->status === 'Pending';
                                }))
                                <a href="/payment/{{ $order->id }}" class="btn btn-primary w-75">Bayar</a>
                            @endif

                            {{-- jika di-acc --}}
                            @if (
                                $order->items->every(function ($item) {
                                    return $item->status === 'Accepted';
                                }))
                                <a href="{{ asset('storage/posts/bukti/' . $order->bukti_pembayaran) }}"
                                    class="btn btn-primary w-75" target="_blank">Lihat bukti </a>
                            @endif

                            {{-- jika di-reject --}}
                            @if (
                                $order->items->every(function ($item) {
                                    return $item->status === 'Rejected';
                                }))
                                @if ($order->bukti_pembayaran != null)
                                    <a href="{{ asset('storage/posts/bukti/' . $order->bukti_pembayaran) }}"
                                        class="btn btn-primary w-75" target="_blank">Lihat bukti </a>
                                @else
                                    <a href="/payment/{{ $order->id }}" class="btn btn-primary w-75" target="_blank">Lihat bukti </a>
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    {{-- AKHIR ORDER STATUS --}}

    {{-- show modal UINSA Food --}}
    <?php
    if ($afterOrder === true) {
        echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var modal = document.getElementById("modalUinsaFood");
                        var myModal = new bootstrap.Modal(modal);
                        myModal.show();
                    });
                </script>';
    }
    ?>
@endsection
