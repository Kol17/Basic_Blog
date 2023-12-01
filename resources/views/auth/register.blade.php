@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class='text-center mb-3'>
            <label class='fs-2 fw-bolder'>Sing Up</label>
            <p>Already have an account? <a href="{{route('login')}}">Sign in here</a></p>
            <a href="#" class='btn btn-outline-success rounded-5'><i class="bi bi-google"></i> Sign in with Google</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-6">
            <div class="card"> 
                <div class="card-body ms-3 me-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}<i class="bi bi-person-circle ps-2"></i></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}<i class="bi bi-envelope-at-fill ps-2"></i></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}<i class="bi bi-person-fill-lock ps-2"></i></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}<i class="bi bi-person-fill-lock ps-2"></i></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="row mb-3 col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-success form-control rounded-5 mt-3">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
