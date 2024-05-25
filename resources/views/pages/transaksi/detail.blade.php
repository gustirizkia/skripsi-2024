@extends('layouts.front')
@section('content')
    <div class="flex justify-center">
        <div class="w-28">
            <img src="{{ asset('image/ilustator/payment.svg') }}" alt="" class="w-28">
        </div>

    </div>
    <div class="mt-5 md:w-1/2 mx-auto">
        <p class="font-medium text-lg  text-center">
            Proses Pembayaran. Lakukan Pembayaran terlebih dahulu
            setelah itu pengacara akan menghubungi anda.
        </p>
        <p class="font-medium text-lg  text-center mt-2">
            segala transaksi disini di tracking oleh sistem
            client berhak untuk mengajukan pengembalian uang
            dengan syarat tertentu. lihat syarat klik disini
        </p>

        <div class="mt-6">
            <div class="font-semibold">
                Informasi Transaksi
            </div>
            <div class="mt-4 md:flex">
                <div class="border rounded-lg px-6 py-3 mb-3">
                    <div class="font-light text-sm">
                        Total Anggaran
                    </div>
                    <div class="text-hijau-custom font-semibold text-xl">
                        Rp. {{ number_format($transaksi->nominal) }}
                    </div>
                </div>
                <div class="border rounded-lg px-6 py-3 md:ml-3 mb-3">
                    <div class="font-light text-sm">
                        Pengacara
                    </div>
                    <div class="text-hijau-custom font-semibold text-xl">
                        {{ $transaksi->pengacara->nama_lengkap }}
                    </div>
                </div>
                <div class="border rounded-lg px-6 py-3 md:ml-3 mb-3">
                    <div class="font-light text-sm">
                        Nomor Transaksi
                    </div>
                    <div class="text-hijau-custom font-semibold text-xl">
                        {{ $transaksi->kode_transaksi }}
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="mb-2">
                    Cara Bayar
                </div>
                <ol>
                    <li>
                        1. Buka mobile banking BCA
                    </li>
                    <li>
                        2. pilih menu transfer bank
                    </li>
                    <li>

                        3. Pilih menu antar rekening'
                    </li>
                    <li>
                        4. Daftarkan nomor rekening berikut 9012312
                    </li>
                    <li>
                        5. Pilih menu transfer antar rekening
                    </li>
                    <li>
                        6. Pilih atas nama PT. Gusma
                    </li>
                    <li>
                        7. Upload bukti bayar dibawah ini
                    </li>
                </ol>
            </div>

            <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="transaksi_id" hidden value="{{ $transaksi->id }}">
                <input type="file" hidden name="bukti_bayar" class="image">

                <div class="mt-5">
                    <div class="p-2 rounded-lg border-2 border-slate-600" id="upload__image">
                        <div class="h-28 w-full bg-slate-600 rounded-xl flex justify-center items-center card_img">

                            <div class="text-white text-lg">
                                Upload bukti bayar
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="bg-hijau-custom-dua py-3 rounded-lg text-white w-full mt-5">
                    Kirim Bukti Bayar
                </button>
            </form>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(".image").on("change", function() {
            let value = this.files[0];

            var reader = new FileReader();

            reader.onload = function(e) {

                console.log('e.target.result', e.target.result)
                $(".card_img").empty();
                $(".card_img").append(`
                    <img src="${e.target.result}" class="h-full w-full object-contain" />

                `);
            };

            reader.readAsDataURL(value);
        })
        $("#upload__image").on("click", function() {
            $(".image").click();
        })
    </script>
@endpush
