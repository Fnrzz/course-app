@extends('home.layouts.layout')

@section('content')
    <div class="container pt-3" style="min-height: 500px">
        <div class="row">
            <div class="col text-center">
                <h3>Lembaga Kursus Kami</h3>
            </div>
        </div>
        @livewire('home-list-product')
    </div>
@endsection
