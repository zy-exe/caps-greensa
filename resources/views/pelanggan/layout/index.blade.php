<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @notifyCss
    {{-- Boostrap 5.2 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- End Boostrap 5.2 --}}

    {{-- Fonts Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    {{-- Akhir Fonts Poppins --}}

    {{-- icons font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- akhir icons font awesome --}}


    <!-- Icons Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    {{-- Akhir icons boostrap --}}

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/user/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/train.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/notify.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/user/loader.css') }}"> --}}
    {{-- Akhir CSS --}}

    {{-- Animate CSS --}}
    {{-- <!-- V3.5.2 --> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
        integrity="sha512-TyUaMbYrKFZfQfp+9nQGOEt+vGu4nKzLk0KaV3nFifL3K8n7lzb8DayTzLOK0pNyzxGJzGRSw78e8xqJhURJ3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Akhir Animate CSS --}}

    {{-- JQUERY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Akhir JQUERY --}}

    <title>Greensa | {{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo-invoice.svg') }}">

</head>


<body>

    {{-- Navbar --}}
    @include('pelanggan.component.navbar')
    {{-- Akhir Navbar --}}

    @include('pelanggan.component.error')

    {{-- Content Section --}}
    @yield('content')
    {{-- Akhir Content Section --}}

    {{-- Footer --}}
    @include('pelanggan.component.footer')
    {{-- Akhir Footer --}}

    {{-- Script Boostrap 5.2 --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    {{-- Akhir Script Boostrap 5.2 --}}

    {{-- Owl Carousel --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"
        integrity="sha512-lo4YgiwkxsVIJ5mex2b+VHUKlInSK2pFtkGFRzHsAL64/ZO5vaiCPmdGP3qZq1h9MzZzghrpDP336ScWugUMTg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Akhir Owl Carousel --}}

    {{-- JS --}}
    <script src="{{ asset('js/custom.js') }}"></script>
</body>



</html>
