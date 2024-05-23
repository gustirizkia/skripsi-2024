@extends('layouts.admin')

@section('title')
    Kategori Hukum
@endsection

@section('content')
    <div class="card">

        <div class="card-body">
            <form action="{{ route('admin.kategori.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">
                            Nama
                        </label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kategori" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">
                            Image/Thumbnail
                        </label>
                        <input type="file" class="form-control" name="image" placeholder="Image" required>
                    </div>
                </div>

                <button type="submit" class="mt-4 btn btn-primary">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection
