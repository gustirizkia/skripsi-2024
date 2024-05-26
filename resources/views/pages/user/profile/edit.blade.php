@extends('layouts.user')

@section('title')
    Profile
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.profile.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Nama
                        </label>
                        <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label required">
                            Email
                        </label>
                        <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">
                            Password Baru
                        </label>
                        <input type="password" class="form-control" name="password">
                        <small class="text-secondary">*Kosongkan jika tidak ingin diubah</small>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="" class="form-label">
                            Konfirmasi Password Baru
                        </label>
                        <input type="password" class="form-control" name="password_confirmation">
                        <small class="text-secondary">*Kosongkan jika tidak ingin diubah</small>
                    </div>
                </div>

                <button class="btn btn-primary">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection
