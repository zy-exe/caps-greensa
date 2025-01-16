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


    <title>Greensa | {{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo-invoice.svg') }}">

<body>


   

    {{-- Content Section --}}
    @yield('content')
    {{-- Akhir Content Section --}}


    {{-- Script Boostrap 5.2 --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    {{-- Akhir Script Boostrap 5.2 --}}

    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Bootstrap Icon --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    {{-- JS --}}
    <script src="{{ asset('js/loginRegis.js') }}"></script>
</body>



</html>
