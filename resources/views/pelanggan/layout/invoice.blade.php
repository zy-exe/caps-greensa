<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Invoice 1 - Bootstrap Brain Component -->
<section id="invoice-container" class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
                <div class="row gy-3 mb-2">
                    <div class="col-12 d-flex align-items-center justify-content-end text-right ">
                        <h4 class="text-uppercase text-endx align-self-center mr-3">
                            GREENSA INN & <br>
                            TRAINING CENTER
                        </h4>
                        <img src="{{ asset('assets/images/logo-invoice.svg') }}" class="img-fluid text-success me-2"
                            alt="Greensa Logo" width="85">
                    </div>
                    {{-- Detail data diri pemesan --}}
                    <div class="col-12">
                        <h4>From</h4>
                        <address>
                            <strong>{{ $order->guest->name }}</strong><br>
                            {{ $order->guest->alamat }}, {{ $order->guest->kota }}<br>
                            {{ $order->guest->provinsi }}<br>
                            Phone: {{ $order->guest->telp }}<br>
                            Email: {{ $order->guest->username }}
                        </address>
                    </div>
                    {{-- Detail data diri pemesan --}}
                </div>
                <div class="row mb-3 d-flex align-items-center">
                    {{-- Data Greensa --}}
                    <div class="col-12 col-sm-6 col-md-7">
                        <h4>Bill To</h4>
                        <address>
                            <strong>Greensa Inn & Training Center</strong><br>
                            Jl. Raya Juanda no. 86 Sedati Agung<br>
                            Sedati, Kab. Sidoarjo<br>
                            Jawa Timur 61253<br>
                            Phone: (031) 8668631<br>
                            Email: greensainn@gmail.com
                        </address>
                    </div>
                    {{-- Akhir data Greensa --}}

                    {{-- Data incoice --}}
                    <div class="col-12 col-sm-6 col-md-5">
                        <h4 class="row">
                            <span class="col-6">Invoice </span>
                        </h4>
                        <div class="row">
                            <span class="col-6">Kegiatan</span>
                            <span class="col-6 text-sm-end"><strong>: {{ $namaKegiatan }}</strong></span>
                            <span class="col-6">Order ID</span>
                            <span class="col-6 text-sm-end">: {{ $order->id }}</span>
                            <span class="col-6">Tanggal Invoice</span>
                            <span class="col-6 text-sm-end">: 12/10/2025</span>
                        </div>
                    </div>
                    {{-- AKhir data invoice --}}
                </div>

                {{-- Data pesanan Ruangan --}}
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-uppercase">No</th>
                                        <th scope="col" class="text-uppercase">Ruangan</th>
                                        <th scope="col" class="text-uppercase">Layout</th>
                                        <th scope="col" class="text-uppercase">Check-in</th>
                                        <th scope="col" class="text-uppercase">Check-out</th>
                                        <th scope="col" class="text-uppercase text-end">Status</th>
                                        <th scope="col" class="text-uppercase text-end">Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($order->items as $index => $item)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                            <td style="white-space: nowrap;">{{ $item->train->nama }}</td>
                                            <td style="white-space: nowrap;">{{ $item->layout }}</td>
                                            <td>{{ $item->checkin }}</td>
                                            <td>{{ $item->checkout }}</td>
                                            @if ($item->status == 'Rejected')
                                                <td class="text-end text-danger"><strong>{{ $item->status }}</strong></td>
                                                <td class="text-end">0</td>
                                            @else
                                                <td class="text-end text-success"><strong>{{ $item->status }}</strong></td>
                                                <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.')}}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row" colspan="6" class="text-uppercase text-end">Total</th>
                                        <td class="text-end">Rp {{ number_format($totalHarga, 0, ',', '.')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Akhir data pesanan Ruangan --}}

                <div class="row">
                    <div class="col-12 d-flex justify-content-end ">
                        <button type="submit" class="btn btn-primary mb-3 mr-2" onclick="window.print()">Print
                            Invoice</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

