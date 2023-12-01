@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>Edit Data</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('adminUpdateCourses', $course->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Masukkan Nama Lembaga"
                            value="{{ old('name') ? old('name') : $course->name }}">
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
                            value="{{ old('email_owner') ? old('email_owner') : $course->email_owner }}">
                        @error('email_owner')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="hidden" class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description"
                            value="{{ old('description') ? old('description') : $course->description }}"></input>
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
                            id="location" placeholder="Masukkan Lokasi Lembaga"
                            value="{{ old('location') ? old('location') : $course->location }}">
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
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#imageModal">
                                Edit Gambar
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Gambar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row row-cols-3 g-3">
                                            @foreach ($course->images as $image)
                                                <div class="col">
                                                    <img src="{{ asset('/storage/ImageCourse/' . $image->name) }}"
                                                        alt="{{ $image->name }}" class="img-fluid">
                                                    <div class="d-grid mt-2">
                                                        <a href="{{ route('adminDeleteImageCourse', $image->id) }}"
                                                            class="btn btn-danger rounded-3">Delete</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
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
