@extends('layouts.app2')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="bg-image d-flex"
        style="min-height: 100vh; background: url('../img/bg-unsplash1.jpg'); background-size: cover;">
        <div class="container py-5 m-auto">
            <div class="row">
                <div class="col">

                    <div class="container" style="">
                        <div class="row">

                            <div class="col-sm-0 col-md-6 col-xl-5 pt-5 pb-5 align-self-center">

                                <div class="card py-4 px-2">
                                    <div class="card-body">
                                        <div class="pb-3 text-center">
                                            <h1 class="h3 font-weight-bold text-dark">Register</h1>
                                            <p>Welcome to our website</p>
                                        </div>

                                        <form action="{{ route('register') }}" method="post">
                                            @csrf

                                            <div class="form-outline mb-4">
                                                <label class="form-label">Name</label>
                                                <input type="name" name="name" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    autocomplete="off" autofocus required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    autocomplete="off" autofocus required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label">Password</label>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label">Confirm Password</label>
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>

                                            <input type="hidden" id="type" name="type" value="admin">
                                            <!-- Submit button -->
                                            <button type="submit"
                                                class="btn btn-block btn-primary mt-4 px-5 mb-4 text-light shadow-custom-green">Register</button>

                                            <!-- Register buttons -->
                                            <div class="text-center">
                                                <p>Already has account? <a href="{{ route('login') }}"
                                                        class="text-primary">Sign In</a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </div>

                            <div class="col text-center align-self-center">
                                <h1 class="h3 font-weight-bold text-light">BRAND</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
