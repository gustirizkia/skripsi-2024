@extends('layouts.admin')

@section('title')
    Edit Data Pengacara
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.lawyer.update', $pengacara->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label ">
                            Foto Profile
                        </label>
                        <input type="file" class="form-control" name="foto_profile" placeholder="Foto ">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Nama lengkap
                        </label>
                        <input type="text" class="form-control" name="nama" required placeholder="Nama "
                            value="{{ $pengacara->nama_lengkap }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Email
                        </label>
                        <input type="email" class="form-control" name="email" required placeholder="Email "
                            value="{{ $pengacara->email }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Nomor Telepon
                        </label>
                        <input type="number" class="form-control" name="nomor_telepon" required
                            placeholder="Nomor Telepon " value="{{ $pengacara->nomor_telepon }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Nama Instansi
                        </label>
                        <input type="text" class="form-control" name="kantor" required placeholder="Kantor "
                            value="{{ $pengacara->nama_instansi }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Pendidikan Terakhir
                        </label>
                        <input type="text" class="form-control" name="pendidikan_terakhir" required
                            placeholder="Pendidikan " value="{{ $pengacara->pendidikan_terakhir }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Kategori
                        </label>
                        <select name="kategori_hukum_id" class="form-select">
                            <option value="">Pilih item</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}" {{ $pengacara->kategori_hukum_id ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label required">
                            Kota
                        </label>
                        <select name="kota" class="form-select">
                            <option value="">Pilih item</option>
                            @foreach ($kota as $itemKota)
                                <option value="{{ $itemKota->id }}" {{ $pengacara->kota_id ? 'selected' : '' }}>
                                    {{ $itemKota->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="" class="form-label ">
                            Sertifikat Advokat
                        </label>
                        <input type="file" class="form-control" name="sertifikat_advokat"
                            placeholder="Sertifikat Advokat">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="" class="form-label required">
                            Tentang
                        </label>
                        <textarea name="tentang" class="form-control">{{ $pengacara->tentang }}</textarea>
                    </div>
                </div>

                <button type="submit" class="mt-4 btn btn-primary">
                    Simpan Data
                </button>
            </form>
        </div>
    </div>
@endsection
