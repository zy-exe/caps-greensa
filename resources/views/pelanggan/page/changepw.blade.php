@extends('pelanggan.layout.loginRegis')

@section('content')
<style>
    #hotel {
        background: #fafafa;
        width: 100%;
        padding: 100px 0px 100px 0px;
    }

    .container-content {
        max-width: 400px;
        margin: 0 auto;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px 30px 10px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="password"]~.toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .profile-button{
        padding: 10px;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    

    .error-message {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

<div id="hotel">
    <div class="container-content">
        @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('profile.change-password') }}"  method="POST">
            @csrf
            <div class="row gy-3">
                <div class="col-md-12">
                    <label for="current_password" class="form-label">Kata Sandi Saat Ini <span
                            class="text-danger">*</span></label>
                    <input type="password" id="current_password" name="current_password" class="form-control"
                        value="" placeholder="Masukkan password" required>
                </div>
                <div class="col-md-12">
                    <label for="current_password" class="form-label">Kata Sandi Baru <span
                            class="text-danger">*</span></label>
                    <input type="password" id="new_password" name="new_password" class="form-control"
                        value="" placeholder="Masukkan password" required>
                </div>
                <div class="col-md-12">
                    <label for="current_password" class="form-label"> Konfirmasi Kata Sandi Baru <span
                            class="text-danger">*</span></label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control"
                        value="" placeholder="Masukkan password" required>
                </div>
            </div>

            <input type="submit" class="mt-4" value="Ganti Kata Sandi">
            <a href="/profile" class="btn btn-success profile-button text-center mt-3 w-100">
                Kembali
            </a>
        </form>
    </div>
</div>

<script>
    function togglePasswordVisibility(fieldId) {
        const passwordField = document.getElementById(fieldId);
        const fieldType = passwordField.getAttribute('type');
        if (fieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    }
</script>

@endsection