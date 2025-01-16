@extends('pelanggan.layout.index')

@section('content')
    <!-- Banner Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/images/tc-banner-1.png') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">Greensa Inn
                            </h6>
                            <h1 class="display-5 text-white mb-4 animated slideInDown fw-bold">Our Training Center
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

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

    <!-- Catalog List -->
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">

                        <!-- Filter -->
                        <div class="col-lg-3 col-md-12 mb-lg-0 px-lg-0 mb-4">
                            <nav class="navbar navbar-filterDropdown navbar-expand-lg navbar-light bg-white rounded shadow">
                                <div class="container-fluid flex-lg-column align-items-stretch">
                                    <h5 class="mt-2">FILTER</h5>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#filterDropdown" aria-controls="filterDropdown"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">

                                        {{-- filter lantai --}}
                                        <div class="border bg-light p-3 rounded mb-3">
                                            <h6 class="mb-3" style="font-size: 18px;">Lantai</h6>
                                            <div class="mb-2">
                                                <input type="checkbox" id="l1" class="form-check-lantai shadow-none me-1" value="1">
                                                <label class="form-check-label" for="l1">Lantai 1</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="l2" class="form-check-lantai shadow-none me-1" value="2">
                                                <label class="form-check-label" for="l2">Lantai 2</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="l3" class="form-check-lantai shadow-none me-1" value="3">
                                                <label class="form-check-label" for="l3">Lantai 3</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="l4" class="form-check-lantai shadow-none me-1" value="4">
                                                <label class="form-check-label" for="l4">Lantai 4</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="l5" class="form-check-lantai shadow-none me-1" value="5">
                                                <label class="form-check-label" for="l5">Lantai 5</label>
                                            </div>
                                        </div>
                                        {{-- end filter lantai --}}

                                        {{-- filter tipe --}}
                                        <div class="border bg-light p-3 rounded mb-3">
                                            <h6 class="mb-3" style="font-size: 18px;">Ruangan</h6>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f1" class="form-check-tipe shadow-none me-1" value="Ruang">
                                                <label class="form-check-label" for="f1">Ruang</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f2" class="form-check-tipe shadow-none me-1" value="Ujian Terbuka">
                                                <label class="form-check-label" for="f2">Ujian Terbuka</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f3" class="form-check-tipe shadow-none me-1" value="Aljabar">
                                                <label class="form-check-label" for="f3">Aljabar</label>
                                            </div>
                                            <div class="mb-2">
                                                <input type="checkbox" id="f4" class="form-check-tipe shadow-none me-1" value="Convention Hall">
                                                <label class="form-check-label" for="f4">Convention Hall</label>
                                            </div>
                                        </div>
                                        {{-- end filter tipe --}}

                                    </div>
                                </div>
                            </nav>
                        </div>
                        <!-- Akhir Filter -->

                        <!-- Awal Card -->
                        <div class="col-lg-9 col-md-12 px-4 catalog-tc">
                            @foreach ($trains as $index => $train)
                                <div class="card mb-4 border-0 shadow train-card" data-train="{{ $train->nama }}" data-floor="{{ $train->lantai }}">
                                    <div class="row g-0 p-3 align-items-center">
                                        {{-- get gambar utama --}}
                                        <div class="col-md-4 mb-lg-0 mb-md-0 mb-3">
                                            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'utama')->value('gambar')) }}"
                                            class="img-fluid rounded" alt="training-center">
                                        </div>
                                        <div class="col-md-6 px-lg-4 px-md-4 px-0">
                                            <h4 class="mb-1 fw-semibold">{{ $train->nama }}</h4>
                                            <div class="row">
                                                <div class="features mb-3 me-1">

                                                    @foreach ($train->facilities as $facility)
                                                        @if ($facility->fasilitas == 'Sound')
                                                            <span class="badge bg-light text-dark text-wrap"> <i
                                                                    class="fa-solid fa-volume-high me-1"></i> Sound</span>
                                                        @endif
                                                        @if ($facility->fasilitas == 'Projector')
                                                            <span class="badge bg-light text-dark text-wrap"><i
                                                                    class="fa-solid fa-display me-1"></i> Projector</span>
                                                        @endif
                                                        @if ($facility->fasilitas == 'WiFi')
                                                            <span class="badge bg-light text-dark text-wrap"><i
                                                                    class="fa-solid fa-wifi me-1"></i> Wifi</span>
                                                        @endif
                                                        @if ($facility->fasilitas == 'Air Conditioner')
                                                            <span class="badge bg-light text-dark text-wrap"><i
                                                                    class="fa-regular fa-snowflake me-1"></i>Air
                                                                Conditioner</span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="lantai  d-flex align-items-center ">
                                                    <div class="col-5">
                                                        <p class="mb-1">Lantai </p>
                                                    </div>
                                                    <div class="col-7 align-items-center">
                                                        <span>:</span>
                                                        <span
                                                            class="badge bg-light text-dark text-wrap">{{ $train->lantai }}</span>
                                                    </div>
                                                </div>
                                                <div class="lantai  d-flex align-items-center ">
                                                    <div class="col-5">
                                                        <p class="mb-1">Kapasitas </p>
                                                    </div>
                                                    <div class="col-7 align-items-center">
                                                        <span>:</span>
                                                        @foreach ($train->layout_models as $layout)
                                                        <span class="badge bg-light text-dark text-wrap">{{ $layout->kapasitas }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="desc-catalog">
                                                <p class="fw-lighter">
                                                    {{ $train->deskripsi }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 catalog-price text-end mt-lg-5 mt-md-5 mt-3">
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <p class="fw-lighter mb-1">Harga</p>
                                                    <h6 class="fw-semibold text-success mb-3">Rp {{ number_format($train->harga, 0, ',', '.')}}</h6>
                                                </div>
                                                <div class="col-12 ">

                                                    @guest('guest')
                                                        <a href="/"
                                                        class="btn btn-sm btn-success w-100 text-white shadow-none mb-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalBookLogin">
                                                        Reservasi</a>
                                                    @endguest

                                                    @auth('guest')
                                                        <a href="/"
                                                        class="btn btn-sm btn-success w-100 text-white shadow-none mb-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalBook{{ $train->id }}">
                                                        Reservasi</a>
                                                    @endauth
                                                    
                                                    <form action="{{ route('train.detail', $train->id) }}" method="GET"> @csrf
                                                        <input type="date" hidden>
                                                        <input type="number" hidden>
                                                        <input type="number" hidden>
                                                        <button type="submit" class="btn btn-sm btn-outline-success w-100 shadow-none">Lihat Detail</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal not login --}}
                                <div class="modal fade" id="modalBookLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> -->
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- Booking Start -->
                                                <div class="container-xxl py-5">
                                                    <div class="container">

                                                        <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                                                            <h6 class="section-title text-center text-dark text-uppercase">
                                                                Sebelum melakukan reservasi, anda harus login dahulu
                                                            </h6>
                                                        </div>

                                                        <div class="col-lg-12"> 
                                                            <div class="row g-3">
                                                                <div class="col-6">
                                                                    <button class="btn btn-outline-success w-100 py-3" data-bs-dismiss="modal"
                                                                    type="button">Kembali</button>
                                                                </div>
                                                                <div class="col-6">
                                                                    <form action="/login" method="GET">
                                                                        <button class="btn btn-success w-100 py-3" type="submit">
                                                                        Login</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal login -->
                                <div class="modal fade" id="modalBook{{ $train->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Booking Start -->
                                                <div class="container-xxl py-1">
                                                    <div class="container">
                                                        <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                                                            <h2 class="fw-bolder text-success text-uppercase">{{ $train->nama }}</h2>
                                                            <span class="badge bg-light text-dark text-wrap lh-base">
                                                                Note : Harga sewa terhitung per 8 jam dalam sehari, apabila
                                                                check-out melebihi jam sewa akan dikenakan charge per jam.
                                                            </span>
                                                        </div>
                                                        <div class="row g-5">
                                                            <div class="col-lg-12">
                                                                <div class="wow fadeInUp" data-wow-delay="0.2s">
                                                                    <form method="POST">
                                                                    @csrf
                                                                    @auth('guest')
                                                                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                                                    <input type="hidden" name="train_id" value="{{ $train->id }}">
                                                                    <input type="hidden" name="harga"value={{ $train->harga * (isset($_POST['lama']) ? $_POST['lama'] : 1) }}>
                                                                    @endauth                                                                    

                                                                        <div class="row g-3 mb-4">
                                                                            <div class="col-md-6">
                                                                                <div class="form-floating date" id="date3" data-target-input="nearest">
                                                                                    <input type="date" name="checkin" id="checkin" class="form-control datetimepicker-input" placeholder="Check In" data-target="#date3" data-toggle="datetimepicker"
                                                                                        value="{{ isset($_POST['dateIn']) ? $_POST['dateIn'] : $currentDate->format('Y-m-d') }}" readonly style="background-color: #e2e2e2; cursor: not-allowed;"/>
                                                                                    <label class="labelBook" for="checkin">
                                                                                        Check In <span class="text-danger">*</span> </label>
                                                                                </div>                                                       
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-floating input-group">
                                                                                    <input type="number" name="lamaHari" id="lamaHari" class="form-control" placeholder="Kapasitas"
                                                                                        value="{{ isset($_POST['lama']) ? $_POST['lama'] : 1 }}" readonly style="background-color: #e2e2e2; cursor: not-allowed;">
                                                                                    <div class="input-group-text">HARI</div>
                                                                                    <label class="labelBook" for="jumlahSewa">Lama Hari <span class="text-danger">*</span></label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-floating">
                                                                                    <select name="layout" id="select-layout" class="form-select select-dropdown" data-target=".capacity-input{{$index}}" data-target2=".keterangan-input{{$index}}" data-target3=".btnCart{{$index}}" data-target4=".btnReservasi{{$index}}" data-target5=".jumlahPeserta{{$index}}" required>
                                                                                        <option value="" disabled selected>Pilih Layout</option>
                                                                                        @foreach ($train->layout_models as $layouts_model)
                                                                                            <option value="{{ $layouts_model->nama_layout }}" data-value="{{ $layouts_model->kapasitas }}">
                                                                                                {{ $layouts_model->nama_layout }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <label class="labelBook" for="select{{$index}}">Layout Model <span class="text-danger">*</span></label>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-6">
                                                                                <div class="form-floating input-group">
                                                                                    <input name="kapasitas" id="kapasitas" type="number" class="form-control capacity-input capacity-input{{$index}}" placeholder="Kapasitas" readonly style="background-color: #e2e2e2; cursor: not-allowed;">
                                                                                    <div class="input-group-text">PAX</div>
                                                                                    <label class="labelBook" for="capacityPax{{$index}}">Kapasitas</label>
                                                                                </div>
                                                                                <p id="label-keterangan-kapasitas" class="keterangan-input{{$index}}" hidden></p>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-floating">
                                                                                    <input name="jam_mulai" id="jam_mulai" type="time" class="form-control" placeholder="jam mulai" data-target=".time-input{{$index}}" required>
                                                                                    <label class="labelBook" for="jam_mulai{{$index}}">jam mulai <span class="text-danger">*</span></label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-6">
                                                                                <div class="form-floating input-group">
                                                                                    <input name="jam_selesai" id="jam_selesai" type="time" class="form-control time-input time-input{{$index}}" placeholder="jam selesai" readonly style="background-color: #e2e2e2; cursor: not-allowed;">
                                                                                    <div class="input-group-text">WIB</div>
                                                                                    <label class="labelBook" for="capacityPax{{$index}}">Jam Selesai</label>
                                                                                </div>
                                                                                <p id="label-keterangan-kapasitas" class="keterangan-input{{$index}}" hidden></p>
                                                                            </div>

                                                                            <div class="col-12">
                                                                                <div class="form-floating">
                                                                                    <textarea name="special" class="form-control" placeholder="Special Request" id="message"></textarea>
                                                                                    <label class="labelBook"
                                                                                        for="message">Special Request</label>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row g-3">
                                                                            <div class="col-12 text-end">
                                                                                <p class="mb-0">Total harga sewa selama {{ isset($_POST['lama']) ? $_POST['lama'] : 1 }} hari</p>
                                                                                <h3 id="trainHarga" class="fw-bolder text-success"> Rp {{ number_format($train->harga * (isset($_POST['lama']) ? $_POST['lama'] : 1), 0, ',', '.')}}</h3>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <button type="submit" name="cart" id="addCart" formaction="/add-to-cart" class="btn btn-outline-success w-100 py-3 btnCart{{ $index }}" disabled>
                                                                                    Tambah Keranjang</button>
                                                                            </div>

                                                                            <div class="col-6">
                                                                                <button type="submit" name="reservasi" id="reservasi" formaction="/reservasi" class="btn btn-success w-100 py-3 btnReservasi{{ $index }}" disabled> 
                                                                                    Reservasi Sekarang</button>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Booking End -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Akhir Modal --}}
                            @endforeach
                        </div>
                        <!-- Akhir Card -->

                    </div>
                </div>
            </div>
        </div>

        <script>

            $(document).ready(function() {
                // Function to filter train cards based on selected floor and room type
                function filterTrainCards() {
                    var selectedFloors = [];
                    $('.form-check-lantai:checked').each(function() {
                        selectedFloors.push($(this).val());
                    });

                    var selectedTypes = [];
                    $('.form-check-tipe:checked').each(function() {
                        selectedTypes.push($(this).val().toLowerCase());
                    });

                    // Show all train cards if no checkboxes are checked
                    if (selectedFloors.length === 0 && selectedTypes.length === 0) {
                        $('.train-card').show();
                        return;
                    }

                    // Hide all train cards
                    $('.train-card').hide();

                    // Filter cards based on selected floor and room type
                    $('.train-card').each(function() {
                        var floor = $(this).data('floor').toString(); // Convert to string for consistent comparison
                        var type = $(this).data('train').toLowerCase();

                        var floorMatch = selectedFloors.length === 0 || selectedFloors.includes(floor);
                        var typeMatch = selectedTypes.length === 0 || selectedTypes.some(function(selectedType) {
                            return type.includes(selectedType);
                        });

                        // Show the card if it matches the selected floor and/or room type
                        if (floorMatch && typeMatch) {
                            $(this).show();
                        } else if (typeMatch && selectedFloors.length === 0) { // Show if only type is selected
                            $(this).show();
                        }
                    });
                }

                // Add change event listeners to checkboxes
                $('.form-check-lantai').change(filterTrainCards);
                $('.form-check-tipe').change(filterTrainCards);
            });

        </script>

    </section>
    <x-notify::notify class="notify-container" />

<!-- Load the necessary JavaScript for notifications -->
@notifyJs
@endsection
