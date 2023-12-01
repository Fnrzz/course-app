@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid py-3">
        <div class="row">
            <a href="{{ route('adminListUsers') }}" class="mb-2">
                <span class="badge text-bg-primary">Kembali</span>
            </a>
            <h3>Detail User :</h3>
        </div>
        <div class="row mb-3">
            <h6>Nama Depan : {{ $user->first_name }}</h6>
            <h6>Nama Belakang : {{ $user->last_name }}</h6>
            <h6>Email : {{ $user->email }}</h6>
            <h6>Nomor Hp : {{ $user->number_phone }}</h6>
            <h6>Alamat : {{ $user->address }}</h6>
            <h6>Transaksi :</h6>
            @if ($user->transactions->count())
                @foreach ($user->transactions as $transaction)
                    <div>
                        <small>
                            {{ $transaction->no_transactions }} :
                            {{ $transaction->status ? $transaction->status : 'Belum Dibayar' }}
                        </small>
                    </div>
                @endforeach
            @else
                <h6>
                    Tidak ada transaksi
                </h6>
            @endif
            <h6>Kartu Identitas :</h6>
            @if ($user->image)
                <div>
                    <img src="{{ asset('/storage/ImageCardUser/' . $user->image) }}" style="width: 500px"
                        alt="{{ $user->image }}">
                </div>
            @endif
        </div>
    </div>
@endsection
