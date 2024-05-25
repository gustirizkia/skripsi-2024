@extends('layouts.user')

@section('title')
    Transaksi Saya
@endsection

@push('addStyle')
    <style>
        .img__lawyer {
            height: auto;
            width: 90px;
            border-radius: 10px;

        }
    </style>
@endpush


@section('content')
    @forelse ($transaksi as $item)
        <a href="{{ route('user.transaksi.show', $item->id) }}">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="d-md-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $item->pengacara->foto) }}" class="img-fluid img__lawyer">
                            <div class="ms-3">
                                <div class="fw-bold ">
                                    {{ $item->pengacara->nama_lengkap }}
                                </div>
                                <div class="text-secondary mt-2">
                                    <i class="bi bi-geo-alt"></i>
                                    <span class="">
                                        {{ $item->pengacara->kota->nama }}
                                    </span>
                                </div>
                                <div class="text-secondary mt-2">
                                    <span class="">
                                        {{ $item->pengacara->kategori->nama }}
                                    </span>
                                    <span class="text-dark fw-bold ms-5">
                                        {{ $item->pengacara->nama_instansi }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="fw-bold mb-md-2 mt-2 mt-md-0 text-md-end">
                                {{ $item->kode_transaksi }}
                            </div>
                            <div class="fw-bold text-success text-md-end">
                                Rp. {{ number_format($item->nominal) }}
                            </div>
                            <div class="text-md-end text-secondary">
                                Status {{ $item->status_pembayaran }}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </a>
    @empty
    @endforelse
@endsection
