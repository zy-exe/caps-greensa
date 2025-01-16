@extends('admin.layouts.index')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        border-radius: 20px;
    }

    .table {
        font-size: 0.7rem;
    }

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
</style>

@section('content')
    <!-- content -->
    <div class="container">
        <h2 class="mb-4">Daftar Ruangan Training Center</h2>
        <hr>

        <a href="/admin-training-center-store" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Ruangan Baru</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Lantai</th>
                        <th>Classroom</th>
                        <th>Teater</th>
                        <th>Round Table</th>
                        <th>U-Shape</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="orderTableBody">
                    @foreach ($trains as $train)
                        <tr>
                            <td>{{ $train->nama }}</td>
                            <td>{{ $train->lantai }}</td>

                            {{-- @foreach ($train->layout_models as $layout)
                                <td>{{ $layout->kapasitas }}</td>
                            @endforeach --}}

                            @for ($i = 0; $i < 4; $i++)
                                @if (isset($train->layout_models[$i]))
                                    <td>{{ $train->layout_models[$i]->kapasitas }}</td>
                                @else
                                    <td>x</td>
                                @endif
                            @endfor

                            <td>Rp {{ number_format($train->harga, 0, ',', '.') }}</td>
                            <td>{{ $train->deskripsi }}</td>
                            <td><img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'utama')->value('gambar')) }}"
                                    class="img-fluid rounded" alt="Train Image" width="100"></td>

                            <td class="d-flex justify-content-center">
                                <form class="mt-3" action="/admin-training-center-delete/{{ $train->id }}"
                                    method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('train.showedit', $train->id) }}" class="btn btn-warning me-1"><i
                                                class="fas fa-pen text-white py-1"></i></a>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fas fa-trash text-white py-1"></i></button>
                                    </div>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
