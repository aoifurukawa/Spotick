@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="background-color: #D9D9D9">

                <div class="card-body">
                    {{-- <div class="d-flex justify-content-between w-100"> --}}
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('images/sport-fans-register.avif') }}" alt="" class="img-fluid " style="max-width: 100%; height: 700px; border-radius: 10px;">
                        </div>

                        
                        <div class="col-6">
                            <h2 class='text-center'>HELLO</h3>
                            <p class='text-center fw-bold'>welocome to Spotick! Nice to meet you.</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                
                                <label for="name" class="form-label fw-bold">{{ __('Name') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <label for="role" class="form-label fw-bold">{{ __('Role') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <select name="role" id="role" class="form-select">
                                            <option value="" hidden></option>
                                            <option value="1">Sponsor</option>
                                            <option value="2">User</option>
                                        </select>
                                        {{-- <input id="role" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> --}}

                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <label for="email" class="form-label fw-bold">{{ __('Email Address') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <label for="zip-code" class="form-label fw-bold">{{ __('Zip Code') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="zip-code" type="number" class="form-control @error('zip-code') is-invalid @enderror" name="name" value="{{ old('zip-code') }}" required autocomplete="zip-code" autofocus>

                                        @error('zip-code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <label for="airport" class="form-label fw-bold">{{ __('Airport (you often use)') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="airport" type="text" class="form-control @error('airport') is-invalid @enderror" name="airport" value="{{ old('airport') }}" required autocomplete="airport" autofocus>

                                        @error('airport')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <label for="password" class="form-label fw-bold">{{ __('Password') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <label for="password-confirm" class="form-label fw-bold">{{ __('Confirm Password') }}</label>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="text-center">
                                        <button type="submit" class="btn w-50" style="background-color: #6cedd8; color: black;">
                                            {{ __('Register') }}
                                        </button>
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
