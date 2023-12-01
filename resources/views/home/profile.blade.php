@extends('home.layouts.layout')

@section('content')
    <section id="profile">
        <div class="container py-5">
            <div class="row">
                <h3 class="text-center mb-5">Pengaturan Profil</h3>
            </div>
            @if (!auth()->user()->image)
                <div class="row">
                    <span class="text-center mb-3 text-danger">*Kartu identitas anda belum terdaftar silahkan upload kartu
                        identitas
                        anda</span>
                </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8 col-12">
                    <form action="{{ route('userEdit', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="fist_name" class="col-sm-3 col-form-label">Fist Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    value="{{ auth()->user()->first_name }}" id="fist_name" name="first_name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    id="last_name" value="{{ auth()->user()->last_name }}" name="last_name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" value="{{ auth()->user()->email }}" name="email">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="number_phone" class="col-sm-3 col-form-label">Number Phone</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('number_phone') is-invalid @enderror"
                                    id="number_phone" value="{{ auth()->user()->number_phone }}" name="number_phone">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_of_birth" class="col-sm-3 col-form-label">Birthday</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                    id="date_of_birth" value="{{ auth()->user()->date_of_birth }}" name="date_of_birth">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea rows="3" class="form-control @error('addresss') is-invalid @enderror" id="address" name="address">{{ auth()->user()->address }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-3 col-form-label">Card Identity</label>
                            <div class="col-sm-7">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">
                            </div>
                            <div class="col-sm-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Lihat
                                </button>

                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Card Identity</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if (auth()->user()->image)
                                                <img src="{{ asset('/storage/ImageCardUser/' . auth()->user()->image) }}"
                                                    class="img-fluid" alt="{{ auth()->user()->image }}">
                                            @else
                                                <h6 class="text-center">Maaf anda belum mengupload kartu identitas anda</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn mb-3 btn-success">Simpan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
