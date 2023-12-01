@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>List User Produk: {{ $product->name }}</h3>
        </div>
        <div class="row">
            @livewire('owner-list-users-product', ['product_id' => $product->id])
        </div>
    </div>
@endsection
