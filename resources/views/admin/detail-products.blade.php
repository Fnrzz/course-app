@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <a href="{{ url()->previous() }}" class="mb-2">
                <span class="badge text-bg-primary">Kembali</span>
            </a>
            <h3>Detail Produk :</h3>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($product->courses->images as $index => $image)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ asset('/storage/ImageCourse/' . $image->name) }}" class="d-block w-100"
                                    alt="{{ $image->name }}" style="height:400px">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <h6>Kursus : {{ $product->name }}</h6>
            <h6>Deskripsi :</h6>
            {!! $product->description !!}
        </div>
        <div class="row">
            <div class="col-6">
                <h6>Langanan :</h6>
                @foreach ($product->subscribes as $subscribe)
                    <button class="btn shadow-sm me-2">
                        {{ $subscribe->name }} <br>
                        Rp.{{ number_format($subscribe->price, 0, ',', '.') }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
@endsection
