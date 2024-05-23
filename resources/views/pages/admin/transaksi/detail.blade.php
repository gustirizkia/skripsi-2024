@extends('layouts.admin')

@section('title')
    Transaksi {{ $transaksi->kode_transaksi }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="fw-bold mb-2">
                        Info pengacara
                    </div>
                    <div class="fw-bold">
                        <a href="">
                            {{ $transaksi->pengacara->nama_lengkap }}
                        </a>
                    </div>
                    <div class="">
                        {{ $transaksi->pengacara->email }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fw-bold mb-2">
                        Transaksi
                    </div>
                    <div class="">
                        No. {{ $transaksi->kode_transaksi }}
                    </div>
                    <div class="">
                        {{ $transaksi->created_at }}
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6">
                    <div class="fw-bold mb-2">
                        Pembayaran
                    </div>
                    <div class="fw-bold">
                        <a href="">
                            Rp. {{ number_format($transaksi->nominal) }}
                        </a>
                    </div>
                    <div class="">
                        {{ $transaksi->status_pembayaran }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fw-bold mb-2">
                        Bukti Bayar
                    </div>
                    @if ($transaksi->bukti_bayar)
                        <img src="{{ asset("storage/$transaksi->bukti_bayar") }}" class="img-fluid"
                            style="height: 140px; width: 140px; object-fit: cover; border-radius: 10px">
                    @else
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="fw-bold text-info">
                            {{ $transaksi->status_pembayaran }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <label for="" class="form-label">
                    Laporan permasalahan
                </label>
                <textarea class="form-control" rows="10">{{ $transaksi->permasalahan }}</textarea>
            </div>

            @if ($transaksi->status_pembayaran === 'Pembayaran dalam proses')
                <div class="mt-4">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Aksi
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="dropdown-item">
                                    <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="Pembayaran berhasil" name="status_pembayaran" hidden>
                                        <div class="submit__data" data-message="Approve Pembayaran">Approve</div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" value="Pembayaran ditolak" name="status_pembayaran" hidden>
                                        <div class="submit__data" data-message="Tolak Pembayaran">Tolak</div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('addScript')
    <script>
        $(".submit__data").on("click", function() {
            var form = $(this).closest("form");
            event.preventDefault();


            let message = $(this).attr("data-message");


            Swal.fire({
                title: "Proses Data Ini ?",
                text: message,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    </script>
@endpush
