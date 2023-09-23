@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center mt-5"> <!-- Menambahkan margin atas dengan class mt-5 -->
        <div class="col-md-6">
            <div class="card">
                <div class="container">
                    <div class="login-container">
                        <div class="text-center">JANGKRIKBOS</div>
                        <hr>
                <div class="card-header text-center bg-primary text-white">
                    <h2>{{ __('Login') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                        </div>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
