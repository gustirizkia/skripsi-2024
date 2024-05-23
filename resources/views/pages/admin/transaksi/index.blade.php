@extends('layouts.admin')

@section('title')
    Transaksi User
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Nomor
                            </th>
                            <th>
                                Client
                            </th>
                            <th>
                                Pengacara
                            </th>
                            <th>
                                Nominal
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>
                                    {{ $item->kode_transaksi }}
                                </td>
                                <td>
                                    {{ $item->user->name }}
                                </td>
                                <td>
                                    {{ $item->pengacara->nama_lengkap }}
                                </td>
                                <td>
                                    Rp. {{ number_format($item->nominal) }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.transaksi.show', $item->id) }}" class="btn btn-primary">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">
                                    Tidak ada data
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
