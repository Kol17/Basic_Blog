@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mt-5">
                <h4>Edit Your Profile</h4>
                <img src="{{asset(auth()->user()->photo)}}" class='profile-image w-25 border border-3 rounded-circle' alt="">
                <p>{{auth()->user()->name}}</p>
                <p>{{auth()->user()->email}}</p>
            </div>

            <form action="{{route('update-password')}}" method='post'>
                @csrf
                
                <div class="form-floating mb-3">
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="yourName" placeholder="old_password">
                    <label for="yourName">Current Password</label>
                    @error('old_password')
                        <div class="invalid-feedback ps-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourName" placeholder="password">
                    <label for="yourName">New Password</label>
                    @error('password')
                        <div class="invalid-feedback ps-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="yourName" placeholder="password_confirmation">
                    <label for="yourName">Confirm Password</label>
                    @error('password_confirmation')
                        <div class="invalid-feedback ps-2">{{$message}}</div>
                    @enderror
                </div>

                <div class="text-center">
                    <button class="btn btn-lg btn-success">Change Passwords</button>
                </div>
                
            </form>

        </div>
    </div>
</div>
@endsection
