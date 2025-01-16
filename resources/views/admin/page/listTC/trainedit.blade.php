<!-- admin/page/train_create.blade.php -->

@extends('admin.layouts.index')

@section('content')
    <div class="container">
        <h2>Edit Ruangan Training Center</h2>

        <!-- Form untuk menambahkan data -->
        <form action="{{ route('train.edit', $train->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Tambahkan input untuk setiap kolom pada tabel trains -->
                <div class="col-md-6 col-12 mb-3">
                    <label for="nama" class="form-label">Nama Ruang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-sm" name="nama" value="{{ $train->nama }}"
                        required>
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <label for="Lantai" class="form-label">Lantai <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" name="lantai" value="{{ $train->lantai }}"
                        required>
                </div>

                @foreach ($train->layout_models as $layout)
                    <div class="col-md-3 col-16 mb-3">
                        <label for="kap_class" class="form-label">Kapasitas {{ $layout->nama_layout }}</label>
                        <input type="number" class="form-control form-control-sm" name="kap_{{ $layout->nama_layout }}"
                            value="{{ $layout->kapasitas }}" required>
                    </div>
                @endforeach

                <div class="col-md-6 col-12 mb-4">
                    <label for="harga" class="form-label">Harga <span class="text-danger">*</span></label>
                    <input type="number" class="form-control form-control-sm" name="harga" value="{{ $train->harga }}"
                        required>
                </div>

                <div class="col-md-6 col-12 mb-4">
                    <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <input type="text-area" class="form-control form-control-sm" name="deskripsi"
                        value="{{ $train->deskripsi }}" required>
                </div>

                <div class="col-md-6 col-12 mb-5">
                    <div class="text-center">
                        <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'utama')->value('gambar')) }}"
                            class="img-fluid rounded mb-3" width="200">
                    </div>
                    <div class="input">
                        <label for="gambar_utama" class="form-label">Gambar Utama <span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-sm" name="gambar_utama" accept="image/*">
                    </div>
                </div>

                <div class="col-md-6 col-12 mb-5">
                    <div class="text-center">
                        <img src="{{ asset('/storage/posts/denah/' . $train->images()->where('konten', 'denah')->value('gambar')) }}"
                            class="img-fluid rounded mb-3" width="200">
                    </div>
                    <div class="input">
                        <label for="gambar_utama" class="form-label">Gambar Denah<span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-sm" name="gambar_denah" accept="image/*">
                    </div>
                </div>

                <div class="col-md-4 col-6 mb-4">
                    <div class="text-center">
                        <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa1')->value('gambar')) }}"
                            class="img-fluid rounded mb-3" width="200">
                    </div>
                    <div class="input">
                        <label for="gambar_utama" class="form-label">Gambar Display 1<span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-sm" name="gambar_biasa1" accept="image/*">
                    </div>
                </div>

                <div class="col-md-4 col-6 mb-4">
                    <div class="text-center">
                        <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa2')->value('gambar')) }}"
                            class="img-fluid rounded mb-3" width="200">
                    </div>
                    <div class="input">
                        <label for="gambar_utama" class="form-label">Gambar Display 2<span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-sm" name="gambar_biasa2" accept="image/*">
                    </div>
                </div>

                <div class="col-md-4 col-6 mb-4">
                    <div class="text-center">
                        <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa3')->value('gambar')) }}"
                            class="img-fluid rounded mb-3" width="200">
                    </div>
                    <div class="input">
                        <label for="gambar_utama" class="form-label">Gambar Display 3<span class="text-danger">*</span></label>
                        <input type="file" class="form-control form-control-sm" name="gambar_biasa3" accept="image/*">
                    </div>
                </div>

                <!-- Tambahkan input untuk kolom lainnya sesuai kebutuhan -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
