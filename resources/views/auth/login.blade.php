@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class='text-center mb-3'>
            <label class='fs-2 fw-bolder'>Sign In</label>
            <p>You don't have an account ? <a href="{{route('register')}}">Sign up here</a></p>
            <a href="#" class='btn btn-outline-success rounded-5'><i class="bi bi-google"></i> Sign in with Google</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-6">
            <div class="card">
                <div class="card-body m-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label">{{ __('Email Address') }}<i class="bi bi-envelope-at-fill ps-2"></i></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}<i class="bi bi-person-fill-lock ps-2"></i></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
