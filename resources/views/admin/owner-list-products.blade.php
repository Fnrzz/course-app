@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>List Produk:</h3>
        </div>
        <div class="row">
            @livewire('owner-list-products')
        </div>
    </div>
@endsection
