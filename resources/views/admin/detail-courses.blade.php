@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <a href="{{ route('adminListCourses') }}" class="mb-2">
                <span class="badge text-bg-primary">Kembali</span>
            </a>
            <h3>Detail Lembaga :</h3>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($course->images as $index => $image)
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
            <h6>Lembaga : {{ $course->name }}</h6>
            <h6>Deskripsi :</h6>
            {!! $course->description !!}
        </div>
        @if ($course->products)
            <div class="row mb-3">
                <div class="col-6">
                    <h6>Kursus :</h6>
                    @foreach ($course->products as $product)
                        <button class="btn shadow-sm me-2">
                            {{ $product->name }} <br>
                        </button>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
