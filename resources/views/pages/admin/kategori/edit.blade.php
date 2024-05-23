@extends('layouts.admin')

@section('title')
    Edit Kategori Hukum
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.kategori.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">
                            Nama
                        </label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kategori"
                            value="{{ $item->nama }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">
                            Image/Thumbnail
                        </label>
                        <input type="file" class="form-control" name="image" placeholder="Image">
                        <small class="text-secondary">
                            *Kosong jika tidak ingin mengubah
                        </small>
                    </div>
                </div>

                <button type="submit" class="mt-4 btn btn-primary">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection
