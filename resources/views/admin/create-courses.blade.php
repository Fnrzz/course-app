@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>Tambah Data</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('adminStoreCourses') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Masukkan Nama Lembaga" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email_owner" class="form-label">Email Owner</label>
                        <input type="text" class="form-control @error('email_owner') is-invalid @enderror"
                            name="email_owner" id="email_owner" placeholder="Masukkan Email Owner"
                            value="{{ old('email_owner') }}">
                        @error('email_owner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="hidden" class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description" value="{{ old('description') }}"></input>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <trix-editor input="description"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location"
                            id="location" placeholder="Masukkan Lokasi Lembaga" value="{{ old('location') }}">
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <div class="col-11">
                            <input type="file" class="form-control mb-2 @error('images') is-invalid @enderror"
                                name="images[]" id="image" multiple>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('adminListCourses') }}" class="btn btn-secondary me-2 rounded-4">Kembali</a>
                        <button type="submit" class="btn btn-success rounded-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
