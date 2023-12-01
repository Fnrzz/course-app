@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>List Produk:</h3>
        </div>
        <div class="row">
            <div class="col-2">
                <a href="{{ route('adminCreateProducts') }}" class="btn btn-primary rounded-4">Tambah Data</a>
            </div>
        </div>
        <div class="row">
            @livewire('admin-list-products')
        </div>
    </div>
@endsection
