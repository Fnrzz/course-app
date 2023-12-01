@extends('home.layouts.layout')
@section('content')
    <section id="header">
        <div class="container pt-3">
            <div class="row align-items-center">
                <div class="col-md-6 col-12"data-aos="fade" data-aos-duration="1000">
                    <h1 class="fw-bold mb-3 title">Welcome To <br> Go-Course!</h1>
                    <h6 class="mb-3">
                        Lebih dari 100 informasi lembaga kursus yang tersedia di platform kami yang akan membantu
                        anda dalam memilih lembaga kursus.
                    </h6>
                    <a href="{{ route('courses') }}" class="btn btn-brown rounded-4">
                        Lihat lembaga kursus
                    </a>
                </div>
                <div class="col-md-6 col-12 text-center">
                    <img src="{{ asset('/image/gambar1.png') }}" data-aos="fade-up" data-aos-duration="1000" alt="gamabr1"
                        class="w-70 img-header">
                </div>
            </div>
        </div>
    </section>
    <section id="kursus" class="mt-5">
        <div class="container">
            <div class="row mb-3">
                <h3 class="text-center fw-bold">Lembaga Kursus Unggulan</h3>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-3 mb-5">
                @foreach ($courses as $course)
                    <div class="col">
                        <div class="card shadow">
                            <img src="{{ asset('/storage/ImageCourse/' . $course->images[0]->name) }}" class="card-img-top"
                                alt="{{ $course->images[0]->name }}">
                            <div class="card-body">
                                <h5 class="card-title ">{{ $course->name }}</h5>
                                <span class="badge text-bg-success mb-3 px-3 py-2 rounded-4">Unggulan</span>
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
            <div class="row">
                <div class="col text-center">
                    <a href="{{ route('courses') }}" class="btn btn-brown rounded-4 fw-bold">Lihat lainnya</a>
                </div>
            </div>
        </div>
    </section>
    <section id="kenapaKami" class="mt-5">
        <div class="container">
            <div class="row mb-3">
                <h3 class="text-center fw-bold">Kelebihan Adanya Platform Go-Course</h3>
            </div>
            <div class="row row-cols-md-2 row-cols-1 g-4 align-items-center">
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <i class="fa-solid fa-medal fs-1 text-brown "></i>
                        </div>
                        <div class="col-8">
                            <p>
                                Platform penyedia layanan lembaga kursus No. 1 di Kampung Inggris dengan segala informasi
                                ter-update
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <i class="fa-solid fa-user-shield fs-1 text-brown"></i>
                        </div>
                        <div class="col-8">
                            <p>
                                Data pengguna yang terjamin keamanannya
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <i class="fa-solid fa-money-bill-wave fs-1 text-brown"></i>
                        </div>
                        <div class="col-8">
                            <p>
                                Platform dengan layanan lembaga kursus yang dilengkapi pembayaran yang mudah
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <i class="fa-solid fa-image fs-1 text-brown"></i>
                        </div>
                        <div class="col-8">
                            <p>
                                Tersedia lengkap dan terperinci informasi dari setiap lembaga kursus di Kampung Inggris
                                dilengkapi dengan foto lingkungan lembaga kursus
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <i class="fa-solid fa-comments fs-1 text-brown"></i>
                        </div>
                        <div class="col-8">
                            <p>
                                Didukung dengan customer service yang siap membantu 24 jam
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row align-items-center">
                        <div class="col-4 text-center">
                            <i class="fa-solid fa-handshake fs-1 text-brown"></i>
                        </div>
                        <div class="col-8">
                            <p>
                                Pilih kursus, bayar, dan segera ikuti kelas sesuai minat Anda!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="menurutMereka" class="my-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col text-center">
                    <h3 class="fw-bold">Simak Kata Mereka!</h3>
                </div>
            </div>
            <div class="row">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <p class="card-text">"Go-Course memberikan fleksibilitas yang sangat dibutuhkan
                                                dalam pembelajaran bahasa Inggris. Saya dapat belajar kapan saja sesuai
                                                dengan jadwal saya sendiri."</p>
                                            <div class="row">
                                                <div class="col">
                                                    <img src="{{ asset('image/1.jpeg') }}" class="rounded-circle"
                                                        width="50px" height="50px" alt="1.jpg">
                                                    <span class="ms-2 text-brown fw-bold">Naviatul Azizah</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <p class="card-text">"Materi pembelajaran yang disediakan oleh Go-Course sangat
                                                lengkap dan komprehensif. Saya merasa bahwa saya mendapatkan pemahaman
                                                menyeluruh dalam semua aspek bahasa Inggris."</p>
                                            <div class="row">
                                                <div class="col">
                                                    <img src="{{ asset('image/2.jpeg') }}" class="rounded-circle"
                                                        width="50px" height="50px" alt="2.jpg">
                                                    <span class="ms-2 text-brown fw-bold">Nurul Khoiriyah</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <p class="card-text">"Instruktur di Go-Course sangat berpengalaman dan dapat
                                                dengan mudah menjelaskan konsep-konsep sulit dengan cara yang mudah
                                                dipahami. Mereka membantu saya mencapai kemajuan yang signifikan dalam
                                                kemampuan berbahasa Inggris saya."</p>
                                            <div class="row">
                                                <div class="col">
                                                    <img src="{{ asset('image/3.jpeg') }}" class="rounded-circle"
                                                        width="50px" height="50px" alt="3.jpg">
                                                    <span class="ms-2 text-brown fw-bold">Miselia Putri</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <p class="card-text">"Pengalaman pembelajaran interaktif di Go-Course membuat
                                                proses belajar menjadi lebih menarik dan menyenangkan. Saya memiliki
                                                kesempatan untuk berinteraksi dengan sesama peserta dan berlatih dalam
                                                situasi nyata."</p>
                                            <div class="row">
                                                <div class="col">
                                                    <img src="{{ asset('image/4.jpeg') }}" class="rounded-circle"
                                                        width="50px" height="50px" alt="4.jpg">
                                                    <span class="ms-2 text-brown fw-bold">Abel Odhienata</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
