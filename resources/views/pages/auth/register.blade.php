<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Register LawTalk</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased container px-6 md:px-20 pt-6 md:pt-16">
        <div class="flex justify-center items-center">
            <div class="md:w-96">
                <div>
                    <img src="{{ asset('image/logo.png') }}" alt="logo" class="w-24">
                </div>
                <div>
                    <div class="font-bold mt-6 text-2xl">Register</div>
                    <div class="text-lg">Kenali masalah hukum anda mudah, terkendali dan aman</div>
                </div>
                <form method="POST" action="{{ route('prosesRegister') }}" class="mt-4">
                    @csrf

                    <div>
                        <div>
                            <div class="mb-2">
                                <label for="name" class="text-lg font-semibold">Nama lengkap</label>
                            </div>
                            <div>
                                <input required type="text" name="name" id="name" autocomplete="off"
                                    autofocus value="{{ old('name') }}"
                                    class="border-gray-300 rounded-lg px-2 py-2 bg-green-50 w-full">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div>
                            <div class="mb-2">
                                <label for="email" class="text-lg font-semibold">Email</label>
                            </div>
                            <div>
                                <input required type="text" name="email" id="email" autocomplete="off"
                                    autofocus value="{{ old('email') }}"
                                    class="border-gray-300 rounded-lg px-2 py-2 bg-green-50 w-full">
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div>
                            <div class="mb-2">
                                <label for="nomor_whatsapp" class="text-lg font-semibold">Nomor whatsapp</label>
                            </div>
                            <div>
                                <input required type="text" name="nomor_whatsapp" id="nomor_whatsapp"
                                    autocomplete="off" autofocus value="{{ old('nomor_whatsapp') }}"
                                    class="border-gray-300 rounded-lg px-2 py-2 bg-green-50 w-full">
                            </div>
                        </div>
                    </div>
                    {{-- password --}}
                    <div class="mt-4 mb-12">
                        <div>
                            <div class="mb-2">
                                <label for="password" class="text-lg font-semibold">Password</label>
                            </div>
                            <div>
                                <input required type="password" name="password" id="password"
                                    class="border-gray-300 rounded-lg px-2 py-2 bg-green-50 w-full">
                            </div>
                        </div>
                    </div>

                    <div class="mt-12">
                        <button type="submit"
                            class="block py-1 rounded-lg
                         bg-hijau-custom text-white w-full mt-10 border-2 border-hijau-custom hover:bg-green-400 hover:border-green-400">Register</button>
                    </div>
                    <div>
                        <a href="{{ route('login') }}"
                            class="block py-1 rounded-lg
                         border border-hijau-custom text-hijau-custom w-full mt-4 text-center hover:bg-hijau-custom hover:text-white">Login</a>
                    </div>
                </form>
            </div>

        </div>
    </div>


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
                text: "{{ Session::get('error') }}"
            });
        </script>
    @endif
</body>

</html>
