@extends('admin.layouts.index')

@section('content')
<!-- content -->
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        border-radius: 20px;
    }
    .table{
            font-size: 0.8rem;
        }

    th,
    td {
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
        text-transform: uppercase;
    }

    td {
        background-color: #fff;
        color: #666;
        border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) td {
        background-color: #f9f9f9;
    }

    tr:hover td {
        background-color: #f2f2f2;
    }

    #searchInput {
        padding: 2px;
        margin-bottom: 5px;
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    #searchIcon {
        padding: 10px;
        border: none;
        background: transparent;
        cursor: pointer;
    }

    .delete-button {
        padding: 8px;
        background-color: #f44336;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #d32f2f;
    }

    .delete-button i {
        font-size: 18px;
    }

    .action-button {
        padding: 5px;
        margin: 5px 0;
        background-color: transparent;
        /* Ubah background menjadi transparan */
        color: black;
        border: 1px solid transparent;
        /* Jadikan border transparan secara default */
        border-radius: 5px;
        cursor: pointer;
        transition: border-color 0.3s;
        /* Animasi perubahan warna border */
    }

    .action-button:hover {
        background-color: #f2f2f2;
        /* Ubah background saat tombol dihover */
        border-color: #333;
        /* Ubah warna border menjadi hitam saat tombol dihover */
    }

    .action-button i {
        font-size: 16px;
        /* Perkecil ukuran ikon */
    }

    .success-message {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <h2 class="mb-4">Admin - Pesanan Komplimen</h2>
    <div class="row g-3" style="position:relative;">
        <div class="col-md-3">
            <label for="formGroupExampleInput" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control form-control-sm" id="searchUser" placeholder="Nama User">
        </div>
        <div class="col-md-3">
            <label for="formGroupExampleInput" class="form-label">Ruangan</label>
            <input type="text" class="form-control form-control-sm" id="searchRuangan" placeholder="Ruangan">
        </div>
        <div class="col-md-2">
            <label for="formGroupExampleInput" class="form-label">Tanggal Awal</label>
            <input type="date" class="form-control form-control-sm" id="searchTanggalAwal" placeholder="Tanggal Awal">
        </div>
        <div class="col-md-2">
            <label for="formGroupExampleInput" class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-control form-control-sm" id="searchTanggalAkhir" placeholder="Tanggal Akhir">
        </div>
        <div class="col-md-2">
            <label for="formGroupExampleInput" class="form-label">Kegiatan</label>
            <input type="text" class="form-control form-control-sm" id="searchKegiatan" placeholder="Kegiatan">
        </div>

        {{-- <input type="text" id="searchUser" placeholder="Nama user">
        <input type="text" id="searchRuangan" placeholder="Ruangan">
        <input type="date" id="searchTanggalAwal" placeholder="Tanggal awal">
        <input type="date" id="searchTanggalAkhir" placeholder="Tanggal akhir">
        <input type="text" id="searchKegiatan" placeholder="Nama kegiatan"> --}}
    </div>
    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                   
                    <th>Pemesan</th>
                    <th>Ruangan</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Harga</th>
                    <th>Kegiatan</th>
                    <th>Info</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @foreach($orders as $order)
                @foreach($order->items->where('status', 'Pending') as $item)
                <tr id="orderRow{{$item->id}}">
                   
                    <td id="namaUser">{{$order->guest->name}}</td>
                    <td id="namaRuangan">{{$item->train->nama}}</td>
                    <td id="tanggalAwal">{{$item->checkin}}</td>
                    <td id="tanggalAkhir">{{$item->checkout}}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td id="namaKegiatan">
                        <a href="{{ asset('storage/posts/surat/' . $order->surat) }}" target="_blank" class="btn btn-primary" view>{{$order->nama_kegiatan}}</a>
                    </td>

                    <td><a href="/" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $item->id }}">Detail</a></td>

                    <td>
                        <form action="">
                            @csrf
                        </form>
                        <form id="acceptForm{{$item->id}}" action="{{ route('admin.order.acc', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="button" onclick="confirmAction('acceptForm{{$item->id}}', 'accept')" class="action-button"><i class="fas fa-check"></i></button>
                        </form>
                        <form id="rejectForm{{$item->id}}" action="{{ route('admin.order.reject', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="button" onclick="confirmAction('rejectForm{{$item->id}}', 'reject')" class="action-button"><i class="fas fa-times"></i></button>
                        </form>
                    </td>

                </tr>

                {{-- Modal detail --}}
                <div class="modal fade" id="modalDetail{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <!-- Modal content -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Pesanan - Komplimen</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3 mb-3">
                                <div class="col-4">
                                    Pemesan
                                </div>
                                <div class="col-8">
                                    : {{ $order->guest->name }}
                                </div>
                                <div class="col-4">
                                    Kegiatan
                                </div>
                                <div class="col-8">
                                    : {{ $order->nama_kegiatan }}
                                </div>
                                <div class="col-4">
                                    Ruangan
                                </div>
                                <div class="col-8">
                                    : {{ $item->train->nama }}
                                </div>
                                <div class="col-4">
                                    Layout
                                </div>
                                <div class="col-8">
                                    : {{ $item->layout }}
                                </div>
                                <div class="col-4">
                                    Check-in
                                </div>
                                <div class="col-8">
                                    : {{ $item->checkin }}
                                </div>
                                <div class="col-4">
                                    Check-out
                                </div>
                                <div class="col-8">
                                    : {{ $item->checkout }}
                                </div>
                                <div class="col-4">
                                    Jam Mulai
                                </div>
                                <div class="col-8">
                                    : {{ $item->jam_mulai }}
                                </div>
                                <div class="col-4">
                                    Jam Selesai
                                </div>
                                <div class="col-8">
                                    : {{ $item->jam_selesai }}
                                </div>
                                <div class="col-4">
                                    Harga
                                </div>
                                <div class="col-8">
                                    : Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </div>
                                <div class="col-4">
                                    Special Request
                                </div>
                                <div class="col-8">
                                    : {{ $item->special }}
                                </div>
                            </div>
                            {{-- <h6>Pemesan: {{ $order->guest->name }}</h6>
                            <h6>Kegiatan: {{ $order->nama_kegiatan }}</h6>
                            <h6>Ruangan: {{ $item->train->nama }}</h6>
                            <h6>Layout: {{ $item->layout }}</h6>
                            <h6>Checkin: {{ $item->checkin }}</h6>
                            <h6>Checkout: {{ $item->checkout }}</h6>
                            <h6>Jam Mulai: {{ $item->jam_mulai }}</h6>
                            <h6>Jam Selesai: {{ $item->jam_selesai }}</h6>
                            <h6>Harga: {{ $item->harga }}</h6>
                            <h6>Special Request: {{ $item->special }}</h6> --}}
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
       
    </form>
</div>

<script>
    // Search by namaUser
    document.getElementById('searchUser').addEventListener('keyup', searchTable);

    // Search by namaRuangan
    document.getElementById('searchRuangan').addEventListener('keyup', searchTable);

    // Search by namaKegiatan
    document.getElementById('searchKegiatan').addEventListener('keyup', searchTable);

    // Search by checkin date
    document.getElementById('searchTanggalAwal').addEventListener('change', searchTable);

    // Search by checkin date
    document.getElementById('searchTanggalAkhir').addEventListener('change', searchTable);

    function searchTable() {
        const searchValueUser = document.getElementById('searchUser').value.toLowerCase();
        const searchValueRuangan = document.getElementById('searchRuangan').value.toLowerCase();
        const searchValueKegiatan = document.getElementById('searchKegiatan').value.toLowerCase();
        const searchValueTanggalAwal = new Date(document.getElementById('searchTanggalAwal').value);
        const searchValueTanggalAkhir = new Date(document.getElementById('searchTanggalAkhir').value);
        const rows = document.querySelectorAll('#orderTableBody tr');

        rows.forEach(row => {
            const namaUser = row.querySelector('td#namaUser').textContent.toLowerCase();
            const namaRuangan = row.querySelector('td#namaRuangan').textContent.toLowerCase();
            const namaKegiatan = row.querySelector('td#namaKegiatan').textContent.toLowerCase();
            const tanggalAwal = new Date(row.querySelector('td#tanggalAwal').textContent);
            const tanggalAkhir = new Date(row.querySelector('td#tanggalAkhir').textContent);

            const foundUser = namaUser.includes(searchValueUser);
            const foundRuangan = namaRuangan.includes(searchValueRuangan);
            const foundKegiatan = namaKegiatan.includes(searchValueKegiatan);
            const isAfterTanggalAwal = tanggalAwal >= searchValueTanggalAwal;
            const isBeforeTanggalAkhir = tanggalAkhir <= searchValueTanggalAkhir;

            // jika search tanggal_awal & tanggal_akhir kosong
            if (document.getElementById('searchTanggalAwal').value === "" && document.getElementById('searchTanggalAkhir').value === "") {
                row.style.display = foundUser && foundRuangan && foundKegiatan ? '' : 'none';
            }

            // jika search tanggal_akhir kosong
            else if (document.getElementById('searchTanggalAwal').value !== "" && document.getElementById('searchTanggalAkhir').value === "") {
                row.style.display = foundUser && foundRuangan && foundKegiatan && isAfterTanggalAwal ? '' : 'none';
                console.log("awal null");
            }
            
            // jika search tanggal_awal kosong
            else if (document.getElementById('searchTanggalAwal').value === "" && document.getElementById('searchTanggalAkhir').value !== "") {
                row.style.display = foundUser && foundRuangan && foundKegiatan && isBeforeTanggalAkhir ? '' : 'none';
            }

            // jika search tanggal_awal & tanggal_akhir tidak kosong
            else {
                row.style.display = foundUser && foundRuangan && foundKegiatan && isAfterTanggalAwal && isBeforeTanggalAkhir ? '' : 'none';
            }

        });
    }

    // Function to check/uncheck all checkboxes
    document.getElementById('checkAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('#orderTableBody input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    setInterval(function() {
        location.reload();
    }, 60000);

    // Get current date
    const currentDate = new Date();

    // Default tanggalAwal
    const firstDateOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 2);
    const formattedFirstDateOfMonth = firstDateOfMonth.toISOString().split('T')[0]; // Format as YYYY-MM-DD
    document.getElementById('searchTanggalAwal').value = formattedFirstDateOfMonth;

    // Default tanggalAkhir
    const lastDateOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0); // Get the last day of the next month, then subtract 1
    const formattedLastDateOfMonth = lastDateOfMonth.toISOString().split('T')[0]; // Format as YYYY-MM-DD
    document.getElementById('searchTanggalAkhir').value = formattedLastDateOfMonth;
</script>

<script>
    function submitForm(form) {
        var checkboxes = form.querySelectorAll('input[type="checkbox"]:checked');
        if (checkboxes.length > 0) {
            if (confirm("Apakah Anda yakin ingin menghapus pesanan yang dipilih?")) {
                form.submit();
                return true; // Menambahkan ini agar form tetap di-submit setelah konfirmasi
            }
        } else {
            alert("Pilih setidaknya satu pesanan untuk dihapus.");
        }
        return false; // Mengembalikan false jika tidak ada checkbox yang dipilih atau konfirmasi dibatalkan
    }
</script>

<script>
    function confirmAction(formId, actionType) {
        var message = "";
        if (actionType === "accept") {
            message = "Apakah Anda yakin ingin menerima pesanan ini?";
        } else if (actionType === "reject") {
            message = "Apakah Anda yakin ingin menolak pesanan ini?";
        }

        if (confirm(message)) {
            document.getElementById(formId).submit();
        }
    }
</script>

@endsection