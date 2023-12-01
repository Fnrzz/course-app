<div>
    <div class="row justify-content-center my-4">
        <div class="col-md-6 col-12">
            <div class="input-group shadow-sm">
                <input type="text" class="form-control" aria-describedby="basic-addon2" wire:model="search"
                    placeholder="Cari Nama Lembaga Kursus">
                <span class="input-group-text bg-success text-white " id="basic-addon2">
                    <div>
                        <i class="bi bi-search"></i>
                    </div>
                </span>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-3 mb-5">
        @foreach ($courses as $course)
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('/storage/ImageCourse/' . $course->images[0]->name) }}" class="card-img-top"
                        alt="{{ $course->images[0]->name }}">
                    <div class="card-body">
                        <h5 class="card-title ">{{ $course->name }}</h5>
                        <div class="d-flex align-items-center">
                            <span>
                                @if ($course->products->isNotEmpty())
                                    @php
                                        $smallestSubscribePrice = $course->products->flatMap->subscribes->min('price');
                                    @endphp
                                    @if ($smallestSubscribePrice !== null)
                                        Mulai:
                                        Rp.{{ number_format($smallestSubscribePrice, 0, ',', '.') }}
                                    @else
                                        Harga tidak tersedia
                                    @endif
                                @else
                                    Kursus tidak tersedia
                                @endif
                            </span>
                            <a href="{{ route('detailCourse', $course->id) }}"
                                class="btn btn-brown ms-auto rounded-4">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
