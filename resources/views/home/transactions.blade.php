@extends('home.layouts.layout')

@section('content')
    <div class="container pt-3" style="min-height:500px">
        <div class="row mb-3">
            <div class="col">
                <h3>List Transactions</h3>
            </div>
        </div>
        <div class="row">
            @livewire('list-transactions')
        </div>
    </div>
@endsection
