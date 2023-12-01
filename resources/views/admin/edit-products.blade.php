@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>Edit Data</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('adminUpdateProducts', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" placeholder="Masukkan Nama Lembaga"
                            value="{{ old('name') ? old('name') : $product->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label">Lembaga</label>
                        <select class="form-select" aria-label="Default select example" name="course_id">
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" @if ($product->course_id == $course->id) selected @endif>
                                    {{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="hidden" class="form-control @error('description') is-invalid @enderror"
                            id="description" name="description"
                            value="{{ old('description') ? old('description') : $product->description }}"></input>
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
                        @foreach ($product->subscribes as $subscribe)
                            <div class="row mb-3">
                                <div class="col-5">
                                    <input type="text" class="form-control" value="{{ $subscribe->name }}" id="classes"
                                        @readonly(true)>
                                </div>
                                <div class="col-5">
                                    <input type="number" class="form-control" value="{{ $subscribe->price }}"
                                        id="class_price" @readonly(true)>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#subscribeModal{{ $subscribe->id }}">
                                        Edit
                                    </button>
                                </div>
                                <div class="col-1">
                                    <a href="{{ route('adminDeleteSubscribeProducts', $subscribe->id) }}"
                                        class="btn">Delete</a>
                                </div>
                            </div>
                        @endforeach
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
    @foreach ($product->subscribes as $subscribe)
        <!-- Modal -->
        <div class="modal fade" id="subscribeModal{{ $subscribe->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kelas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('adminUpdateSubscribeProducts', $subscribe->id) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="text" class="form-control @error('subscribe') is-invalid @enderror mb-2"
                                value="{{ $subscribe->name }}" name="subscribe" id="subscribe">
                            <input type="number" class="form-control @error('subscribe_price') is-invalid @enderror"
                                value="{{ $subscribe->price }}" name="subscribe_price" id="subscribe_price">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script src="{{ asset('js/addButton.js') }}"></script>
@endsection
