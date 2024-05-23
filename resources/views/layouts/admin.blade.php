<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar/logo favicon.png') }}">
    <!-- CSS files -->
    <link href="/demo/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="/demo/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="/demo/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="/demo/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="/demo/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .loading {
            position: fixed;
            height: 100vh;
            width: 100%;
            background-color: rgba(49, 49, 49, 0.168);
            top: 0;
            z-index: 10000;

        }

        header .card.notif {
            max-height: 314px;
            overflow-y: auto;
        }

        table.table {
            white-space: nowrap;
        }

        .table-sm>:not(caption)>*>* {
            padding: 0.25rem 0.25rem;
            font-size: 12px;
        }

        .table img {
            height: 40px;
            width: 40px;
            object-fit: contain;
        }
    </style>

    @stack('addStyle')
</head>

<body id="body">
    <script src="/demo/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <!-- Sidebar -->
        @include('includes.admin._sidebar')


        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Page
                            </div>
                            <h2 class="page-title">
                                @yield('title')
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>


            <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">

                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; {{ \Carbon\Carbon::now()->format('Y') }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <!-- Libs JS -->
    <script src="{{ asset('plugin/jquery-3.7.1.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="/demo/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="/demo/dist/js/demo.min.js?1684106062" defer></script>

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

    @if (Session::get('toast_success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal
                        .resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('toast_success') }}'
            });
        </script>
    @endif

    <script>
        $(".confirm_delete").on("click", function() {
            var form = $(this).closest("form");
            event.preventDefault();
            let message = $(this).attr("data-message");


            if (message) {
                message = `Data ${message} akan dihapus`
            }

            Swal.fire({
                title: "Hapus Data Ini ?",
                icon: "warning",
                text: message ? message : "",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    </script>

    <script>
        let tempDisplayLoading = false;

        function displayLoading() {
            if (!displayLoading) {
                tempDisplayLoading = true;

                $(".loading__global").show();

                console.log("HALLO LOADING");

            } else {
                tempDisplayLoading = false;
                $(".loading__global").hide();
            }
        }

        let isFullScreen = false;

        function enterFullScreen() {
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        }

        function exitFullScreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            }
        }

        function toggleFullScreen() {
            if (!isFullScreen) {
                enterFullScreen();
                isFullScreen = true;
            } else {
                exitFullScreen();
                isFullScreen = false;
            }
        }

        window.addEventListener('load', () => {
            if (isFullScreen) {
                enterFullScreen();
            }
        });
    </script>

    {{-- <script>
        function saveErrorJs(msg) {

        }
    </script> --}}


    @if (Session::get('print_inv'))
        <script>
            $(document).ready(function() {
                const newWindow = window.open('{{ Session::get('print_inv') }}', '_blank');
                newWindow.document.open();

                newWindow.document.close();
                setTimeout(function() {
                    newWindow.close();
                }, 3000);

            })
        </script>
    @endif

    @stack('addScript')
</body>

</html>
