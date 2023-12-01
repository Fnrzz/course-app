@extends('home.layouts.layout')

@section('content')
    <section id="image">
        <div class="container pt-3">
            <div class="row">
                <a href="{{ url()->previous() }}" class="mb-2">
                    <span class="badge text-bg-primary">Kembali</span>
                </a>
            </div>
            <div class="row g-3">
                <div class="col-md-6 col-12">
                    <img src="{{ asset('/storage/ImageCourse/' . $product->courses->images[0]->name) }}"
                        class="img-fluid rounded-3" alt="{{ $product->courses->images[0]->name }}">
                </div>
                <div class="col-md-6 col-12">
                    <div class="row row-cols-3 g-3">
                        @foreach ($product->courses->images as $image)
                            @if (!$loop->first)
                                <div class="col">
                                    <img type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        src="{{ asset('/storage/ImageCourse/' . $image->name) }}"
                                        class="img-fluid rounded-3" alt="{{ $image->name }}" id="thumbnailImage"
                                        data-image="{{ asset('/storage/ImageCourset/' . $image->name) }}">
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
                    <h3 class="fw-bold text-center text-brown">{{ $product->courses->name }}</h3>
                    <h5 class="fw-bold text-center text-brown">{{ $product->name }}</h5>
                    <div style="text-align: justify">
                        {!! $product->description !!}
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    @livewire('count-cart-product', ['productId' => $product->id])
                </div>
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
