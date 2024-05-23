<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_desc', 'LawTalk Solusi Hukum Terbaru Di Indonesia | LAWTALK Memudahkan Layanan Hukum')">
    <meta name="keywords" content="@yield('meta_key', 'Layanan Hukum Indonesia lengkap : Hukum Pidana, Hukum Perdata ')">
    <meta itemprop="image" content="@yield('meta_image', asset('image/logo.png'))">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://gusti.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('met_title', 'Layanan Hukum Hanya Tinggal Sekali Klik')">
    <meta property="og:description" content="@yield('meta_desc', 'LawTalk Solusi Hukum Terbaru Di Indonesia | LAWTALK Memudahkan Layanan Hukum')">
    <meta property="og:image" content="@yield('meta_image', asset('image/logo.png'))">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Lawtech')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @stack('style')

</head>

<body>
    {{-- navbar --}}
    @include('includes.navbar')
    {{-- endnavbar --}}

    {{-- bottombar --}}
    <div class="md:hidden">
        @include('includes.bottombar')
    </div>
    {{-- endbottombar --}}



    @stack('header')
    <div class="font-sans text-gray-900 antialiased container px-2 md:px-20  md:pt-2">
        @yield('content')
    </div>
    @include('includes.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::get('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ Session::get('success') }}"
            });
        </script>
    @endif

    @if (Session::get('error'))
        <script>
            Swal.fire({
                icon: "error",
                title: "{{ Session::get('error') }}"
            });
        </script>
    @endif

    @stack('script')
</body>

</html>
