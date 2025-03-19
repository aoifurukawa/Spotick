@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"">
            <div class="card" style="background-color: #D9D9D9; border-radius: 20px;">

                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-6">
                            <img src="{{ asset('images/sport-fans.jpg') }}" alt="" class="img-fluid " style="max-width: 100%; height: 400px; border-radius: 20px;">
                        </div>

                        <div class="col-6">
                            <h2 class='text-center'>WELCOME BACK</h3>
                                <p class='text-center fw-bold'>Please enter your details.</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                
                                <label for="email" class="form-label fw-bold">{{ __('Email Address') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <label for="password" class="form-label fw-bold">{{ __('Password') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn w-100" style="background-color: #9b58ec; color: white;">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
