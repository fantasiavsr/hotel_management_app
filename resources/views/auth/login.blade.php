@extends('layouts.app2')

@section('content')
    <div class="bg-image d-flex"
        style="min-height: 100vh; background: url('../img/bg-unsplash1.jpg'); background-size: cover;">
        <div class="container py-5 m-auto">
            <div class="row">
                <div class="col">
                    {{-- <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}


                    <div class="container" style="">
                        <div class="row">

                            <div class="col-sm-0 col-md-6 col-xl-5 pt-5 pb-5 align-self-center">

                                <div class="card py-4 px-2">
                                    <div class="card-body">
                                        <div class="pb-3 text-center">
                                            <h1 class="h3 font-weight-bold text-dark">Sign In</h1>
                                            <p>We're so excited to see you again!</p>
                                        </div>

                                        <form action="{{ route('login') }}" method="post">
                                            @csrf

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
                                                <input type="password" name="password" id="password" autocomplete="off"
                                                    class="form-control @error('password') is-invalid @enderror" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            {{-- <input type="hidden" id="role" name="role" value="0"> --}}
                                            <!-- Submit button -->
                                            <button type="submit"
                                                class="btn btn-block btn-primary mt-4 px-5 mb-4 text-light shadow-custom-green">Login</button>

                                            <!-- Register buttons -->
                                            <div class="text-center">
                                                <p>Not a member? <a href="{{ route('register') }}"
                                                        class="text-primary">Register</a>
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
