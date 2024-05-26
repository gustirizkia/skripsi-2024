@extends('layouts.front')

@section('content')
    <div class="min-h-screen">
        <div class="md:flex items-center justify-center mt-8">
            <img src="{{ asset('image/ilustator/lawyer-find.png') }}" class="w-56 h-auto" alt="">
            <div class="md:ml-8">
                <div class="text-hijau-custom text-lg md:text-2xl font-semibold">Kami Bantu Anda untuk Menemukan Lawyer
                    Terbaik</div>
                <div class="flex justify-around mt-2">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 text-hijau-custom">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="text-gray text-xs md:text-lg ml-2 font-semibold">
                            Gratis
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 text-hijau-custom">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="text-gray text-xs md:text-lg ml-2 font-semibold">
                            Sesuai Kebutuhan
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            class="w-5 h-5 text-hijau-custom">
                            <path fill-rule="evenodd"
                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="text-gray text-xs md:text-lg ml-2 font-semibold">
                            Respon Lebih Cepat
                        </div>
                    </div>
                </div>
                <div class="bg-hijau-custom text-white rounded-lg py-2 px-3 inline-block mt-6">
                    carikan saya lawyer
                </div>
            </div>
        </div>

        <div class="grid grid-flow-row grid-cols-12 gap-4 mt-14">
            <div class="md:col-span-2 col-span-12 hidden md:block">
                <div class="font-bold">Filter</div>
                <form action="">
                    <div class="rounded shadow w-full bg-white p-2 mt-4">
                        <div class="text-sm font-semibold mb-2">Tipe</div>
                        <div>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio"
                                    {{ request()->get('tipe') === 'populer' ? 'checked' : '' }} name="tipe"
                                    value="populer">
                                <span class="ml-2">Populer</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio" name="tipe"
                                    {{ request()->get('tipe') === 'terbaru' ? 'checked' : '' }} value="terbaru">
                                <span class="ml-2">Terbaru</span>
                            </label>
                        </div>
                        <hr class="my-3 bg-gray-700">
                        <div class="text-sm font-semibold mb-2">Kategori Hukum</div>
                        <div>
                            @foreach ($kategori as $item)
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio" name="kategori"
                                        {{ (int) request()->get('kategori') === $item->id ? 'checked' : '' }}
                                        value="{{ $item->id }}">
                                    <span class="ml-2">{{ $item->nama }}</span>
                                </label>
                            @endforeach

                        </div>
                        <button type="submit"
                            class="bg-hijau-custom text-white rounded-lg py-2 px-3 w-full text-center inline-block mt-6">
                            Filter
                        </button>
                    </div>
                </form>

            </div>
            <div class="md:col-span-10 col-span-12">
                <div class="grid grid-flow-row grid-cols-12 gap-4">
                    @foreach ($pengacara as $item)
                        <div class="md:col-span-6 col-span-12">
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
                                        <div class="mt-1 flex">
                                            <div class="text-gray-500 text-sm">
                                                3 Client
                                            </div>
                                        </div>
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
                                        <path
                                            d="M173.923 40.2442C173.923 92.264 65.7693 125.669 11.6924 133H173.923V40.2442Z"
                                            fill="#2DC53C" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
