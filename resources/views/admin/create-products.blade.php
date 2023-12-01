@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>Tambah Data</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('adminStoreProducts') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Masukkan Nama Kursus" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label">Lembaga</label>
                        <select class="form-select" aria-label="Default select example" name="course_id">
                            <option selected>Pilih Lembaga</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
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
                        <div class="row">
                            <div class="col-5">
                                <label for="subscribe" class="form-label">Langanan</label>
                            </div>
                            <div class="col-5">
                                <label for="subscribe_price" class="form-label">Harga Langanan</label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5">
                                <input type="text" class="form-control @error('subscribe') is-invalid @enderror"
                                    name="subscribe[]" id="subscribe">
                            </div>
                            <div class="col-5">
                                <input type="number" class="form-control @error('subscribe') is-invalid @enderror"
                                    name="subscribe_price[]" id="subscribe_price">
                            </div>
                        </div>
                        <div id="input-subscribe">
                            {{-- input --}}
                        </div>
                        <button type="button" class="btn btn-info btn-sm rounded-3" onclick="addSubscribe()">
                            Tambah Langanan
                        </button>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('adminListProducts') }}" class="btn btn-secondary me-2 rounded-4">Kembali</a>
                        <button type="submit" class="btn btn-success rounded-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/addButton.js') }}"></script>
@endsection
