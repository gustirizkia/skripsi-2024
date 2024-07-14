@extends('layouts.front')
@section('content')
    <div class="min-h-screen md:w-[50%] mx-auto">

        <form action="{{ route('transaksi-store') }}" method="post">
            @csrf
            <input type="number" name="pengacara" value="{{ $pengacara->id }}" hidden>
            <div class="font-bold text-right">
                Proses Hiring Pengacara
            </div>
            <div class="mt-2">
                <div class="flex">
                    <img src="{{ asset("storage/$pengacara->foto") }}" alt="Pengacara Online"
                        class="h-24 w-24 object-cover rounded-lg">
                    <div class="ml-3">
                        <div class="font-bold text-lg ">
                            {{ $pengacara->nama_lengkap }}
                        </div>
                        <div class="mt-2 flex items-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <div class=" text-sm ml-2">{{ $pengacara->kota->nama }}</div>
                        </div>
                        <div class="mt-2 flex">
                            <div class="text-gray-800 font-semibold ">
                                Hukum {{ $pengacara->kategori->nama }}
                            </div>
                            <div class="text-gray-800 font-semibold ml-6">
                                {{ $pengacara->nama_instansi }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <div class="font-semibold mb-3">
                    Tentang
                </div>
                <div class="border p-4 rounded-lg">
                    {{-- <p class="whitespace-pre-wrap">{{ $pengacara->tentang }}</p> --}}
                    <p class="whitespace-pre-wrap tentang">{{ \Illuminate\Support\Str::limit($pengacara->tentang, 150, $end = '...') }} </p>

                    <div class="font-bold cursor-pointer underline text-green-600 load_more">Selengkapnya</div>
                </div>
            </div>

            <div class="mt-8">
                <div class="font-semibold mb-3">
                    Sertifikat Advokat
                </div>
                <div class="border p-4 rounded-lg">
                    <img src="{{ asset("storage/$pengacara->sertifikat_advokat") }}" class="h-44 w-44 object-contain" alt="">
                </div>
            </div>

            <div class="mt-8">
                <div class="font-semibold">
                    Laporan permasalah hukum anda
                </div>

                <div class="mt-4">
                    <textarea name="laporan" class="border rounded-lg p-3 w-full border-gray-300" cols="30" rows="5">{{ old('laporan') }}</textarea>
                </div>
            </div>

            <div class="mt-6">
                <div class="font-semibold">
                    Berapa total anggaran Anda?
                </div>

                <div class="mt-4">
                    <input type="text" name="total_anggaran" class="border rounded-lg p-2 w-full border-gray-300 money"
                        value="{{ old('total_anggaran') }}">
                </div>

            </div>

            @if ($errors->any())
                <div class="alert alert-danger my-5 text-red-600 font-semibold">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mt-8">
                <button type="submit" class="bg-hijau-custom text-white block w-full py-3 rounded-lg">
                    Kirim Data
                </button>
            </div>

        </form>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/jQuery-Mask-Plugin-master/src/jquery.mask.js') }}"></script>
    <script>
        $('.money').mask('#.##0', {
            reverse: true
        });

        let load_more = false;
        $(".load_more").on("click", function(){
            if (!load_more) {
                $("p.tentang").text(`{{ $pengacara->tentang }}`)
            } else {
                $("p.tentang").text(`{{ \Illuminate\Support\Str::limit($pengacara->tentang, 150, $end = '...') }}`)

            }

            $(".load_more").hide()
        })
    </script>
@endpush
