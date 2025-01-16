@extends('pelanggan.layout.index')


@section('content')
    <style>
        #hotel {
            background: #fafafa;
            width: 100%;
            padding: 100px 0px 100px 0px;
        }

        h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            /* background-color: #4caf50; */
            /* color: white; */
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn {
            /* color: white; */
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
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
                    <h1 class="text-white">Profil Pengguna</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/home">
                                    <i class="fas fa-home text-white"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Profil Pengguna</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    {{-- END HERO SECTION --}}

    {{-- PROFILE --}}
    <div class="container rounded mt-5 mb-5">
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <h4 class="text-center">Pengaturan Profil </h4>
                    </div>

                    @if (session('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="d-flex flex-column align-items-center text-center mb-4 ">
                        <img class="rounded-circle" width="150px" src="{{ asset('assets/images/profile_user.png') }}"><span
                            class="font-weight-bold">{{ $guest->name }}</span><span
                            class="text-black-50">{{ $guest->email }}</span><span>
                        </span>
                    </div>

                    <form action="{{ route('profile.update', ['id' => $guest->id]) }}" method="POST">
                        <div class="row gy-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6"><label class="labels">Nama <span
                                class="text-danger">*</span></label><input type="text" id="name"
                                    name="name" class="form-control" value="{{ $guest->name }}" required></div>
                            <div class="col-md-6"><label class="labels">NIK <span
                                class="text-danger">*</span></label><input type="number" id="nik"
                                    name="nik" class="form-control" value="{{ $guest->nik }}" required></div>
                            <div class="col-md-6"><label class="labels">Nomor Telepon <span
                                class="text-danger">*</span></label><input type="tel"
                                    id="telp" name="telp" class="form-control" value="{{ $guest->telp }}" required>
                            </div>
                            <div class="col-md-6"><label class="labels">Username <span
                                class="text-danger">*</span></label><input type="text" id="username"
                                    name="username" class="form-control" value="{{ $guest->username }}" readonly style="background-color: #e2e2e2; cursor: not-allowed;" required></div>
                            <div class="col-md-12"><label class="labels">Alamat <span
                                class="text-danger">*</span></label><input type="text" id="alamat"
                                    name="alamat" class="form-control" value="{{ $guest->alamat }}" required></div>
                            <div class="col-md-6"><label class="labels">Kota <span
                                class="text-danger">*</span></label><input type="text" id="kota"
                                    name="kota" class="form-control" value="{{ $guest->kota }}" required></div>
                            <div class="col-md-6"><label class="labels">Provinsi <span
                                class="text-danger">*</span></label><input type="text" id="provinsi"
                                    name="provinsi" class="form-control" value="{{ $guest->provinsi }}" required></div>
                            <div class="col-md-6"><label class="labels">Negara <span
                                class="text-danger">*</span></label><input type="text" id="negara"
                                    name="negara" class="form-control" value="{{ $guest->negara }}" required></div>
                            <div class="col-md-6"><label class="labels">Tanggal Lahir <span
                                class="text-danger">*</span></label><input type="date"
                                    id="tanggallahir" name="tanggallahir" class="form-control"
                                    value="{{ $guest->tanggallahir }}" required></div>

                            <div class="mt-5 d-flex justify-content-between">
                                <input class="btn btn-success profile-button" type="submit" value="Simpan Profile">
                                
                                <a href="/change-password" class="btn btn-danger profile-button text-center">
                                    Ubah Password?
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                            Experience</span><span class="border px-3 p-1 add-experience"><i
                                class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text"
                            class="form-control" placeholder="experience" value=""></div> <br>
                    <div class="col-md-12"><label class="labels">Additional Details</label><input type="text"
                            class="form-control" placeholder="additional details" value=""></div>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- END PROFILE --}}

@endsection
