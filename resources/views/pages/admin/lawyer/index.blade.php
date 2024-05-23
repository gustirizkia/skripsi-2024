@extends('layouts.admin')

@section('title')
    Manajemen Lawyer
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.lawyer.create') }}" class="btn btn-primary">
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Instansi
                            </th>
                            <th>
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->nama_instansi }}</td>
                                <td>
                                    <a href="{{ route('admin.lawyer.edit', $item->id) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
