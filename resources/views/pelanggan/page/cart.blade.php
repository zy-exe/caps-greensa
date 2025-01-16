@extends('pelanggan.layout.index')

{{-- <link rel="stylesheet" href="{{ asset('css/user/cart.css') }}"> --}}

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
                    <h1 class="text-white">Cart</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.htm">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}

    {{-- CSS CART/KERANJANG --}}
    <style>
        .title {
            margin-bottom: 3vh;
        }

        .card {
            margin: auto;
            width: 95%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }

            .hari {
                font-size: 12px
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }



        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        .keterangan {
            font-size: 12px;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }


        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>
    {{-- END CSS CART/KERANJANG --}}

    {{-- CART/KERANJANG --}}
    <div class="card my-5">
        <div class="row">
            <div class="col-md-8 cart">
                {{-- title --}}
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4 class="fw-bold m-0 text-md-start text-center">SHOPPING CART</h4>
                        </div>
                    </div>
                </div>
                {{-- end title --}}

                @if ($guest->cart->items->isEmpty())
                {{-- KERANJANG KOSONG --}}
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-12 text-center">
                                <span>Cart masih kosong</span>
                            </div>
                        </div>
                    </div>
                {{-- END KERANJANG KOSONG --}}
                @else
                {{-- KERANJANG BERISI --}}
                    @foreach ($guest->cart->items as $item)
                        <div class="row border-top border-bottom w-100 d-flex align-items-center">
                            <div class="row main align-items-center py-3">
                                <div class="col-md-2 col-12 gambar">
                                    <a href="{{ route('train.detail', $item->train_id) }}">
                                        <img src="{{ asset('/storage/posts/' . $item->train->images()->where('konten', 'utama')->value('gambar')) }}"
                                        class="blur-up lazyloaded w-100 rounded" alt="training-center">
                                    </a>
                                </div>
                                <div class="col-md-3 col-12 keterangan-ruang mt-md-0 mt-3">
                                    <a class=" text-decoration-none text-success fw-bold" style="text-transform:uppercase"
                                        href=": {{ route('train.detail', $item->train_id) }}">
                                        {{ $item->train->nama }}
                                    </a>
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-12 col-6 p-0 text-muted keterangan">{{ $item->layout }}</div>
                                        <div class="col-md-12 col-6 p-0 text-muted keterangan text-md-start text-end">
                                            {{ $item->checkin }}</div>
                                    </div>

                                </div>
                                <div class="col-md-2 col-12 hari text-muted">
                                    <span>{{ $item->lama }} Hari</span>
                                </div>
                                <div class="col-md-3 col-6 d-flex align-items-center harga">
                                    <p class="m-0 text-md-center text-end text-success fw-bold">
                                        Rp {{ number_format($item->harga, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div class="col-md-2 col-6 hapus">
                                    <form class="m-0 text-end" action="/cart-item-delete/{{ $item->id }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger border-0"><i
                                                class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                {{-- END KERANJANG BERISI --}}
                    <a href="/training-center" class="back-to-shop btn btn-success text-white">
                        <span href="#" class="text-decoration-none text-white ">&leftarrow;</span>
                        RESERVASI KEMBALI
                    </a>
                @endif
            </div>

            {{-- RINGKASAN PESANAN --}}
            <div class="col-md-4 summary">
                <div>
                    <h5><b>RINGKASAN</b></h5>
                </div>
                <hr>
                <div class="col-12 fw-bold mb-3" style="padding-left:0; text-transform:uppercase">List Ruang</div>
                {{-- LOOP ITEM --}}
                @foreach ($guest->cart->items as $item)
                    <div class="row mb-2">
                        <div class="col-6 keterangan" style="padding-left:0; text-transform:uppercase">
                            {{ $item->train->nama }}</div>
                        <div class="col-6 keterangan text-end price"> Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </div>
                    </div>
                @endforeach
                {{-- END LOOP ITEM --}}
                <div class="row mt-4 " style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col-6 ps-0">TOTAL HARGA</div>
                    <div class="col-6 text-end total-price" id="totalPrice">Rp xxx.xxx.xxx</div>
                </div>
                
                {{-- CART EMPTY CAN'T CHECKOUT --}}
                @if ($guest->cart->items->isEmpty())
                    <form action="/checkout" method="POST"> @csrf
                        <button type="submit" class="btn btn-success w-100 mt-2" disabled>CHECKOUT</button>
                    </form>
                {{-- END CART EMPTY CAN'T CHECKOUT --}}

                {{-- CART CHECKOUT --}}
                @else
                    <form action="/checkout" method="POST"> @csrf
                        <button type="submit" class="btn btn-success w-100 mt-2" onclick="this.form.submit();this.disabled = true;">CHECKOUT</button>
                    </form>
                {{-- END CART CHECKOUT --}}
                @endif
                

                {{-- Javascript --}}
                {{-- FUNCTION TOTAL PRICE --}}
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Calculate the total price dynamically
                        const prices = document.querySelectorAll('.price');
                        let totalPrice = 0;

                        prices.forEach(priceElement => {
                            const priceString = priceElement.innerText.replace('Rp ', '').replace('.', '').replace('.',
                                '');
                            const price = parseFloat(priceString);
                            totalPrice += price;
                        });

                        // Update the total price element
                        const totalElement = document.getElementById('totalPrice');
                        totalElement.innerText = 'Rp ' + numberWithCommas(totalPrice.toFixed());
                    });

                    function numberWithCommas(x) {
                        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                </script>
                {{-- END FUNCTION TOTAL PRICE --}}
            </div>


        </div>
    </div>
    {{-- END CART/KERANJANG --}}
    <x-notify::notify />
    @notifyJs
@endsection
