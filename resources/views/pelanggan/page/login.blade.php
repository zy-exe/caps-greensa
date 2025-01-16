@extends('pelanggan.layout.loginRegis')


@section('content')


{{-- Awal Login --}}
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <img src="{{ asset('assets/images/login.png') }}" alt="Greensa Login" class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" />
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4 text-center">
                                    <h1 class="fw-medium">Masuk</h1>
                                </div>
                            </div>
                        </div>
                        <form action="/guestlogin" method="POST">
                            @csrf
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="username" id="email" placeholder="Masukkan email" value="{{ old('username') }}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="password" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}" name="password" id="password" value="" placeholder="Masukkan password" required>
                                        <span class="input-group-text toggle-password" id="toggle-password"><i class="bi bi-eye-slash"></i></span>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-outline-primary" type="submit">Masuk</button>
                                    </div>
                                </div>
                                <x-notify::notify />
                                @notifyJs
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class=" mb-2 border-secondary-subtle">
                                <div class="d-flex px-0 gap-2 gap-md-5 flex-column flex-md-row justify-content-md-evenly">
                                    <a href="/register" method="GET" class="link-secondary text-decoration-none">Buat Akun</a>
                                    <a href="/forgot-password" class="link-secondary text-decoration-none">Lupa Kata Sandi?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Akhir Login --}}
@endsection

