@extends('layouts.admin')

@section('title')
    Kategori Hukum
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Nama Kategori
                            </th>
                            <th>
                                Image/Thumbnail
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
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    <img src="{{ asset("storage/$item->image") }}">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.kategori.edit', $item->id) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.kategori.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <span class="btn btn-danger confirm_delete ms-3"
                                                data-message="{{ $item->nama }}">
                                                Hapus
                                            </span>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="8">
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
