@extends('layouts.front')

@push('header')
    <div class=" md:-mt-14 z-0">
        <div class="">
            <img src="{{ asset('image/bg-home-full.jpg') }}" alt="" class="z-10">
        </div>
    </div>
@endpush

@section('content')
    <div>

        {{-- kategori --}}
        <div class="mt-4 md:mt-8">
            <div class="font-semibold text-2xl text-center">Kategori</div>
            <div class="md:flex grid grid-cols-4 gap-4 justify-around mt-4">
                @foreach ($kategori as $item)
                    <div>
                        <a href="{{ route('lawyer-page', ['kategori' => $item->id]) }}">
                            <img src="{{ asset('storage/' . $item->image) }}" class="md:w-28"
                                alt="Hukum {{ $item->nama }}">
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
        {{-- endkategori --}}

        {{-- Pengacara Populer --}}
        <div class="md:col-span-10 col-span-12 mt-8">
            <div class="grid grid-flow-row grid-cols-12 gap-4">
                @foreach ($pengacara as $index => $item)
                    <div class="md:col-span-4 col-span-12">
                        <div class="border shadow rounded-lg p-4 relative">
                            <div class="flex">
                                <img src="{{ asset("storage/$item->foto") }}" alt="image lawyer"
                                    class="rounded-lg w-24 h-28 object-cover">
                                <div class="ml-3">
                                    <h1 class="font-bold">
                                        {{ $item->nama_lengkap }}
                                    </h1>
                                    <div class="mt-1 flex items-center text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        <div class=" text-sm ml-2">{{ $item->kota->nama }}</div>
                                    </div>
                                    <div class="mt-2">
                                        <div class="text-gray-800 font-semibold text-sm">
                                            Hukum {{ $item->kategori->nama }}
                                        </div>
                                    </div>
                                    @if (count($item->transaksi->where('status_pembayaran', '!=', 'Pembayaran ditolak')))
                                        <div class="mt-1 flex">
                                            <div class="text-gray-500 text-sm">
                                                {{ count($item->transaksi->where('status_pembayaran', '!=', 'Pembayaran ditolak')) }}
                                                Client
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-2 font-semibold">
                                Mulai dari Rp {{ number_format($item->harga_termurah) }}
                            </div>
                            <a href="{{ route('proses-hiring', ['id' => $item->id]) }}"
                                class="bg-hijau-custom py-2 px-14 mt-2 cursor-pointer rounded-lg inline-block text-white text-sm">
                                Hire</a>
                            <div class="shappe absolute bottom-0 right-0">
                                <svg width="172" height="133" viewBox="0 0 172 133" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M173.923 18.9354C173.923 82.9056 57.9744 123.985 0 133H173.923V18.9354Z"
                                        fill="#ABFBB3" />
                                    <path d="M173.923 40.2442C173.923 92.264 65.7693 125.669 11.6924 133H173.923V40.2442Z"
                                        fill="#2DC53C" />
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        {{-- endPengacara Populer --}}

        {{-- about connection --}}
        <div class="mt-16">
            <div class="grid grid-flow-row grid-cols-5 md:grid-cols-12 gap-6">
                <div class="col-span-5">
                    <img src="{{ asset('image/connect2.png') }}" alt="connection.png">
                </div>
                <div class="col-span-5 flex items-center">
                    <div class="">
                        <div class="font-bold text-3xl">
                            Lakukan <span class="text-hijau-custom-dua">Meeting</span> Tanpa Batas Dengan <span
                                class="text-hijau-custom-dua">Pengacara</span>
                            <hr class="w-20 bg-hijau-custom-dua mt-2 h-1 rounded-full">
                        </div>
                        <div class="mt-4">
                            Pengacara yang sudah terverifikasi siap untuk menyelesaikan masalah hukum anda, lakukan meeting
                            dengan mudah bersama pengacara yang tersebar di seluruh indonesia.
                        </div>
                        <div class="mt-8">
                            <a href="" class="bg-hijau-custom-dua px-3 py-2 rounded text-white">
                                Temukan Pengacara
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        {{-- endabout connection --}}

        @push('style')
            <link rel="stylesheet" href="{{ asset('slick-1.8.1/slick/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('slick-1.8.1/slick/slick-theme.css') }}">
        @endpush
        @push('script')
            <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
            <script src="{{ asset('slick-1.8.1/slick/slick.min.js') }}"></script>
            <script src="{{ asset('slick-1.8.1/slick/slick.js') }}"></script>
            <style>
                .slick-slide {
                    padding: 10px;
                    /* background-color: red; */
                    text-align: center;
                    margin-right: 10px;
                    margin-left: 10px;
                }
            </style>
            <script>
                $(document).ready(function() {
                    $('.your-class').slick({
                        slidesToScroll: 1,
                        dots: true,
                        centerMode: true,
                        focusOnSelect: true,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        variableWidth: true,
                        infinite: true,
                        centerPadding: '60px',
                        margin: '27px'
                    });
                });
            </script>
        @endpush
    </div>
@endsection
