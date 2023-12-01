@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center mt-5">
                <h3>Edit Profile</h3>
                <img src="{{asset(auth()->user()->photo)}}" alt="" id="profile-img" class="profile-img rounded-circle border border-2 " style="width:13rem;">
                <br>
                <button class="btn btn-primary btn-sm" id="edit-photo" style="margin-top:-25px;"><i class="bi bi-pencil-square"></i></button>
                <p>{{auth()->user()->name}}</p>
                <p>{{auth()->user()->email}}</p>
            </div>

           <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="file" name='photo' accept="image/jpeg,image/png"  class='d-none @error('photo') is-invalid @enderror'>
                @error('photo')
                    <div class='invalid-feedback ps-2'>{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name='name' id="yourName"  value="{{auth()->user()->name}}" class='form-control @error('name') is-invalid @enderror'>
                <label for="yourName">Name</label>
                @error('name')
                    <div class='invalid-feedback ps-2'>{{$message}}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input disabled type="email" name='email' id="yourEmail" value="{{auth()->user()->email}}" class='form-control' placeholder="name@example.com">
                <label for="yourEmail">Email</label>
            </div>
            
            <div class='text-center'>
                <button class='btn btn-lg btn-primary'>Update Profile</button>
            </div>
            
           </form>
        </div>
    </div>
</div>
@endsection

@push("scripts")
    <script>
        let profileImage = document.querySelector(".profile-img");
        let editPhoto = document.querySelector("#edit-photo");
        let photo = document.querySelector("[name='photo']");

        editPhoto.addEventListener('click',_=>photo.click());
        photo.addEventListener("change",_=>{
            let file = photo.files[0];
            let reader = new FileReader();
            reader.onload =  function(){
                profileImage.src = reader.result;
            }
            reader.readAsDataURL(file);
        })

    </script>
@endpush