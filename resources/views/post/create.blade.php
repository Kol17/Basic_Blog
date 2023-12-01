@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-8 ">
        <form action="{{route('post.store')}}" method='post' enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-4">
                <input type="text" class='form-control rounded-4 @error('title') is-invalid @enderror' name='title' value="{{old('title')}}" placeholder="Post Title">
                <label for="postTitle">Post Title</label>
                @error('title')
                    <div class="invalid-feedback ps-2">{{$message}}</div>
                @enderror
            </div> 

            <div class="mb-4">
                <img src="{{asset("image_default.png")}}" id='coverPreview' class="cover-img img-fluid rounded @error('cover') border border-danger is-invalid @enderror">
                <input type="file" class='d-none' id='cover' accept="image/jpeg,image/png" name='cover' value="{{old('cover')}}">
                @error('cover')
                    <div class='invalid-feedback ps-2'>{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-4">
                <textarea name="description" id="floatingTextarea" class=" form-control rounded-4 @error('description') is-invalid @enderror" placeholder="Leave a comment...">{{old('description')}}</textarea>
                <label for="floatingTextarea2">Share Your Experience</label>
                @error('description')
                    <div class="invalid-feedback ps-2">{{$message}}</div>
                @enderror
            </div>

            <div class='text-center mb-4'>
                <button type="submit" class='btn btn-lg btn-outline-primary'>Create</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection

@push("scripts")
    <script>
        let coverPreview = document.querySelector("#coverPreview");
        let cover = document.querySelector("#cover");
        coverPreview.addEventListener("click",_=>cover.click());
        cover.addEventListener("change",_=>{
            let file = cover.files[0];
            let reader = new FileReader();
            reader.onload = function(){
                coverPreview.src = reader.result;
            }
            reader.readAsDataURL(file);
        });
    </script>
    
@endpush