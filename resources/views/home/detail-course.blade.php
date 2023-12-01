@extends('home.layouts.layout')

@section('content')
    <section id="image">
        <div class="container pt-3">
            <div class="row">
                <a href="{{ route('courses') }}" class="mb-2">
                    <span class="badge text-bg-primary">Kembali</span>
                </a>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-12">
                    <img src="{{ asset('/storage/ImageCourse/' . $course->images[0]->name) }}" class="img-fluid rounded-3"
                        alt="{{ $course->images[0]->name }}">
                </div>
                <div class="col-md-6 col-12">
                    <div class="row row-cols-3 g-3">
                        @foreach ($course->images as $image)
                            @if (!$loop->first)
                                <div class="col">
                                    <img type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        src="{{ asset('/storage/ImageCourse/' . $image->name) }}"
                                        class="img-fluid rounded-3" alt="{{ $image->name }}" id="thumbnailImage"
                                        data-image="{{ asset('/storage/ImageCourse/' . $image->name) }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img id="modalImage" src="" class="img-fluid" alt="Modal Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="deskripsi" class="my-5">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-8 col-12">
                    <h3 class="fw-bold text-center text-brown">{{ $course->name }}</h3>
                    <div style="text-align: justify">
                        {!! $course->description !!}
                    </div>
                    <div class="mt-3 text-center">
                        {!! $course->location !!}
                    </div>
                </div>
                @if ($course->products->count())
                    <div class="col-md-4 col-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Pilihan Kursus</h5>
                                <div class="row row-cols-2 g-2">
                                    @foreach ($course->products as $product)
                                        <div class="col">
                                            <a href="{{ route('detailChoosenCourse', $product->id) }}"
                                                class="btn btn-brown rounded-4 w-100">{{ $product->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <script>
        var thumbnailImages = document.querySelectorAll('#thumbnailImage');
        var modalImage = document.getElementById('modalImage');

        thumbnailImages.forEach(function(image) {
            image.addEventListener('click', function() {
                var imageUrl = this.getAttribute('data-image');
                modalImage.src = imageUrl;
            });
        });
    </script>
@endsection
