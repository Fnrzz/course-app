@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <h3>List Transactions:</h3>
        </div>
        <div class="row">
            @livewire('admin-list-transactions')
        </div>
    </div>
@endsection
