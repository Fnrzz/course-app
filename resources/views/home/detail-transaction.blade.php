@extends('home.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row mb-3">
            <a href="{{ route('transactions') }}" class="mb-2">
                <span class="badge text-bg-primary">Kembali</span>
            </a>
        </div>
        <div class="row mb-3">
            <div class="col">
                <h3>Detail Transaksi</h3>
            </div>
        </div>
        <div class="row">
            <h6>No Transaksi : {{ $transaction->no_transactions }}</h6>
            <h6>Status : {{ $transaction->payment ? $transaction->payment->status : 'Belum Dibayar' }}</h6>
        </div>
        <hr>
        <div class="row g-3 mb-5" style="min-height: 200px">
            <div class="col-md-6 col-12">
                <div class="card shadow rounded-4 h-100" data-aos="fade-right" data-aos-duration="1000">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="mb-2">
                                    <h6>Nama : <br>{{ auth()->user()->name }}</h6>
                                </div>
                                <div class="mb-2">
                                    <h6>Lembaga : <br>{{ $transaction->product->courses->name }}</h6>
                                </div>
                                <div class="mb-2">
                                    <h6>Kursus : <br>{{ $transaction->product->name }}</h6>
                                </div>
                                <div class="mb-2">
                                    <h6>Langganan : <br>{{ $transaction->subscribe->name }}</h6>
                                </div>
                                <div class="mb-2">
                                    <h6>Harga :
                                        <br>Rp.{{ number_format($transaction->subscribe->price, 0, ',', '.') }}
                                    </h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('/storage/ImageCourse/' . $transaction->product->courses->images[0]->name) }}"
                                    class="img-fluid" alt="{{ $transaction->product->courses->images[0]->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (!$transaction->payment)
                <div class="col-md-6 col-12">
                    <div class="card shadow rounded-4 h-100" data-aos="fade-left" data-aos-duration="1000">
                        <div class="card-body">
                            <div class="mb-2">
                                <h6>Pembayaran</h6>
                                <img src="{{ asset('/image/bca.png') }}" width="80px" class="rounded-3 my-2"
                                    alt="bca.png">
                                <h6>No Rekening : 123456789</h6>
                                <h6>Kirim Bukti Pembayaran</h6>
                            </div>
                            <form action="{{ route('storePayment', $transaction->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" class="form-control mb-3" name="image" id="image">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success rounded-4">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
