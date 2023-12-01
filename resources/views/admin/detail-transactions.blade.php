@extends('admin.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row mb-3">
            <a href="{{ route('adminListTransactions') }}" class="mb-2">
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
        <div class="row mb-5" style="height: 200px">
            <div class="col-6">
                <div class="card shadow rounded-4 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <div class="mb-2">
                                    <h6>Nama :
                                        <br>{{ $transaction->user->first_name . ' ' . $transaction->user->last_name }}</h6>
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
            @if ($transaction->payment)
                <div class="col-6">
                    <div class="card shadow rounded-4 h-100">
                        <div class="card-body">
                            <div class="row mb-3">
                                <h6>Bukti Pembayaran :</h6>
                                <button type="button" class="btn btn-primary rounded-4" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Lihat Bukti Pembayaran
                                </button>
                            </div>
                            <div class="row">
                                <h6>Aksi :</h6>
                                <a href="{{ route('adminSendTransaction', $transaction->no_transactions) }}"
                                    class="btn btn-success rounded-4">Verifikasi Transaksi</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('/storage/ImagePayment/' . $transaction->payment->name) }}"
                                    alt="{{ $transaction->payment->name }}" class="img-fluid">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
