@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row align-items-center" style="height: 80vh">
            <div class="col">
                <h1 class="text-center">Selamat Datang {{ auth()->user()->first_name }}</h1>
            </div>
        </div>
    </div>
@endsection
