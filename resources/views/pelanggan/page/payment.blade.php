@extends('pelanggan.layout.loginRegis')
 {{-- icons font awesome --}}
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
 integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- akhir icons font awesome --}}

@section('content')
    <div class="container my-5">
        <div class="row header-table">
            <div class="col-12 p-0">
                <form action="/order">
                    <button class="btn btn-success mb-3">Kembali ke halaman order</button>
                </form>
            </div>

            {{-- jika sudah expired --}}
            @if ($order->is_expired === 1)
                <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                    <p class="m-0 mt-5"><span class="fw-bold text-danger">Order gagal karena waktu transfer sudah habis</span></p>
                    <h1 class="mb-3 countdown display-2 fw-bold text-danger">00:00:00</h1>
                    <p>Waktu pembuatan pesanan: {{ \Carbon\Carbon::parse($order->created_at)->formatLocalized('%d %B %Y %H:%M:%S') }}</p>
                </div>

            @else
                {{-- jika pending, dan belum upload pembayaran --}}
                @if ($status === 'Pending' && $sudah_bayar === false)
                {{-- BSI --}}
                @if ($order->metode_pembayaran === 'BSI')
                    <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                        <p class="m-0 mt-5">Segera transfer sejumlah <span class="fw-bold text-success">Rp.
                                {{ number_format($totalHarga, 0, ',', '.') }}</span> ke rekening berikut :</p>
                        <img src="{{ asset('assets/images/BSI.png') }}" alt="" class="mt-3" style="width: 30%">
                        <h5 class="m-0 mt-4">030-098-0976</h5>
                        <p class="text-secondary">a/n Greensa</p>
                        <h1 class="mb-3 countdown display-2 fw-bold text-success" id="countdown">- : - : -</h1>

                        <div class="col-5 mb-3">
                            <label class="labels">Upload bukti transfer<span class="text-danger">*</span></label>
                            <div class="col-12">
                                <form action="/payment/kirim" method="POST" enctype="multipart/form-data"> @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*">
                                    <button class="btn btn-success my-4 w-100" type="submit" onclick="this.form.submit();this.disabled = true;">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    {{-- BTN --}}
                    <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                        <p class="m-0 mt-5">Segera transfer sejumlah <span class="fw-bold text-success">Rp.
                                {{ number_format($totalHarga, 0, ',', '.') }}</span> ke rekening berikut :</p>
                        <img src="{{ asset('assets/images/BTN.png') }}" alt="" class="mt-5" style="width: 30%">
                        <h5 class="m-0 mt-4">6401300009990</h5>
                        <p class="text-secondary">a/n Greensa</p>
                        <h1 class="mb-3 countdown display-2 fw-bold text-success" id="countdown">- : - : -</h1>

                        <div class="col-5 mb-3">
                            <label class="labels">Upload bukti transfer<span class="text-danger">*</span></label>
                            <div class="col-12">
                                <form action="/payment/kirim" method="POST" enctype="multipart/form-data"> @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <input type="file" name="bukti_pembayaran" class="form-control" accept="image/*">
                                    <button class="btn btn-success my-4 w-100" type="submit" onclick="this.form.submit();this.disabled = true;">Kirim</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            {{-- jika pending, dan sudah upload bukti pembayaran --}}
            @if ($status === 'Pending' && $sudah_bayar === true)
                {{-- BSI --}}
                @if ($order->metode_pembayaran === 'BSI')
                    <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                        <img src="{{ asset('assets/images/BSI.png') }}" alt="" class="mt-3" style="width: 30%">
                        <h5 class="m-0 mt-4">030-098-0976</h5>
                        <p class="text-secondary">a/n Greensa</p>
                        <p class="m-0 my-5"><span class="fw-bold text-success">Bukti pembayaran sudah terkirim.</span>
                            <br>Menunggu konfirmasi dari admin</p>

                        <p class="m-0 mb-2 fw-semibold">Silahkan Memesan Catering di UINSA Food</p>
                        <a href="https://food.uinsa.ac.id/" class="btn btn-success w-50 d-flex align-items-center justify-content-center fs-4 fw-semibold mb-2"><i class="fa-solid fa-utensils me-2 fs-4"></i> UINSA Food</a></p>
                    </div>
                @else
                    {{-- BTN --}}
                    <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                        <img src="{{ asset('assets/images/BTN.png') }}" alt="" class="mt-5" style="width: 30%">
                        <h5 class="m-0 mt-4">030-098-0976</h5>
                        <p class="text-secondary">a/n Greensa</p>
                        <p class="m-0 my-5"><span class="fw-bold text-success">Bukti pembayaran sudah terkirim.</span>
                            <br>Menunggu konfirmasi dari admin</p>
                            
                            <p class="m-0 mb-2 fw-semibold">Silahkan Memesan Catering di UINSA Food</p>
                            <a href="https://food.uinsa.ac.id/" class="btn btn-success w-50 d-flex align-items-center justify-content-center fs-4 fw-semibold mb-2"><i class="fa-solid fa-utensils me-2 fs-4"></i> UINSA Food</a></p>
                    </div>
                @endif
            @endif

            {{-- jika order di-acc --}}
            @if ($status === 'Accepted')
                <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                    <h1 class="mb-3 countdown display-2 fw-bold text-success">Pesanan sudah dibayar</h1>
                </div>
            @endif

            {{-- jika order ditolak --}}
            @if ($status === 'Rejected')
                <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                    <h1 class="mb-3 countdown display-2 fw-bold text-danger">Pesanan ditolak oleh admin</h1>
                </div>
            @endif
            @endif

        </div>
    </div>

    {{-- FUNCTION COUNTDOWN --}}
    <script>
        // Get the timestamp from Laravel's created_at column
        var createdAtTimestamp = "{{ $order->created_at }}"; // Replace with the timestamp from Laravel's created_at column
    
        // Convert the timestamp to a JavaScript Date object
        var createdAtDate = new Date(createdAtTimestamp);
    
        // Add 1 hour to the created_at time
        var targetTime = new Date(createdAtDate.getTime() + (1 * 60 * 60 * 1000)); // 1 hour in milliseconds
    
        // Function to update the countdown label every second
        function updateCountdown() {
            // Get the current time
            var currentTime = new Date();
    
            // Calculate the difference in milliseconds between the current time and the target time
            var difference = targetTime.getTime() - currentTime.getTime();
    
            // Calculate remaining hours, minutes, and seconds
            var remainingHours = Math.floor(difference / (1000 * 60 * 60));
            var remainingMinutes = Math.floor((difference / (1000 * 60)) % 60);
            var remainingSeconds = Math.floor((difference / 1000) % 60);
    
            // Update the countdown label
            var countdownLabel = document.getElementById("countdown");
            countdownLabel.textContent = remainingHours.toString().padStart(2, '0') + ":" +
                remainingMinutes.toString().padStart(2, '0') + ":" +
                remainingSeconds.toString().padStart(2, '0');
    
            // If remaining time becomes negative, stop the countdown and delete the order
            if (difference <= 0) {
                clearInterval(interval);
                countdownLabel.textContent = "00:00:00";
                // location.reload();
                window.location.href = "/payment-failed/{{ $order->id }}"
            }
        }
    
        // Update the countdown label every second
        var interval = setInterval(updateCountdown, 1000);
    </script>
    {{-- END FUNCTION COUNTDOWN --}}

@endsection
