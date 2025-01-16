<!-- admin/page/train_create.blade.php -->

@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <h2>Menambah Ruangan Training Center</h2>

        <!-- Form untuk menambahkan data -->
        <form action="/admin-training-center-store" method="POST" enctype="multipart/form-data"> @csrf

            <!-- Tambahkan input untuk setiap kolom pada tabel trains -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="lantai" class="form-label">Lantai</label>
                <input type="number" class="form-control" name="lantai" required>
            </div>

            <div class="mb-3">
                <label for="kap_class" class="form-label">Kapasitas Classroom</label>
                <input type="number" class="form-control" name="kap_class" required>
            </div>

            <div class="mb-3">
                <label for="kap_teater" class="form-label">Kapasitas Teater</label>
                <input type="number" class="form-control" name="kap_teater" required>
            </div>

            <div class="mb-3">
                <label for="kap_teater" class="form-label">Kapasitas Round Table</label>
                <input type="number" class="form-control" name="kap_roundtable" required>
            </div>

            <div class="mb-3">
                <label for="kap_teater" class="form-label">Kapasitas U-Shape</label>
                <input type="number" class="form-control" name="kap_ushape" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" name="harga" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="textarea" class="form-control" name="deskripsi" required>
            </div>

            <div class="mb-3">
                <label>Gambar Utama</label>
                <input type="file" class="form-control" name="gambar_utama" accept="image/*">
            </div>

            <div class="mb-3">
                <label>Gambar Display 1</label>
                <input type="file" class="form-control" name="gambar_biasa1" accept="image/*">
            </div>

            <div class="mb-3">
                <label>Gambar Display 2</label>
                <input type="file" class="form-control" name="gambar_biasa2" accept="image/*">
            </div>

            <div class="mb-3">
                <label>Gambar Display 3</label>
                <input type="file" class="form-control" name="gambar_biasa3" accept="image/*">
            </div>

            <div class="mb-3">
                <label>Gambar Denah</label>
                <input type="file" class="form-control" name="gambar_denah" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
@endsection
