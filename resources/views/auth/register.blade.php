@extends('auth.layouts.layout')
@section('content')
    <section id="register">
        <div class="container pt-3">
            <div class="row justify-content-center">
                <div class="col-md-6 col-12">
                    <div class="card shadow rounded-4">
                        <div class="card-body p-3">
                            <h5 class="card-title text-center my-3">Register</h5>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <div class="row row-cols-2 g-3">
                                        <div class="col">
                                            <label for="first_name" class="form-label">First Name</label>
                                            <input value="{{ old('first_name') }}" type="text" name="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name" aria-describedby="emailHelp">
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input value="{{ old('last_name') }}" type="text" name="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                                aria-describedby="emailHelp">
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row row-cols-2 g-3">
                                        <div class="col">
                                            <label for="email" class="form-label">Email</label>
                                            <input value="{{ old('email') }}" type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                placeholder="Masukan Email Gmail Anda">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row row-cols-2 g-3">
                                        <div class="col">
                                            <label for="number_phone" class="form-label">Number Phone</label>
                                            <input type="number" name="number_phone"
                                                class="form-control @error('number_phone') is-invalid @enderror"
                                                id="number_phone">
                                            @error('number_phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                                            <input type="date" name="date_of_birth"
                                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                                id="date_of_birth">
                                            @error('date_of_birth')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" name="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                                        id="address"></textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit"
                                        class="btn btn-brown text-white rounded-4 fw-bold">Register</button>
                                </div>
                            </form>
                            <div class="row my-3">
                                <a href="{{ route('login') }}" class="text-center">login ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
