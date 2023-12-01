@extends('auth.layouts.layout')

@section('content')
    <section id="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="card shadow rounded-4">
                        <div class="card-body p-3">
                            <h5 class="card-title text-center mb-3">Login</h5>
                            <form action="{{ route('authenticate') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-brown text-white fw-bold rounded-4">Login</button>
                                </div>
                            </form>
                            <div class="row my-3">
                                <a href="{{ route('register') }}" class="text-center">Register ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
