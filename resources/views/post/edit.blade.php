@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-8 ">
        <form action="{{route('post.update',$post->id)}}" method='post' enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-floating mb-4">
                <input type="text" class='form-control rounded-4 @error('title') is-invalid @enderror' name='title' value="{{old('title',$post->title)}}" placeholder="Post Title">
                <label for="postTitle">Post Title</label>
                @error('title')
                    <div class="invalid-feedback ps-2">{{$message}}</div>
                @enderror
            </div> 

            <div class="mb-4">
                <img src="{{asset("storage/cover/".$post->cover)}}" id='coverPreview' class="cover-img img-fluid rounded @error('cover') border border-danger is-invalid @enderror">
                <input type="file" class='d-none' id='cover' accept="image/jpeg,image/png" name='cover' value="{{old('cover',$post->cover)}}">
                @error('cover')
                    <div class='invalid-feedback ps-2'>{{$message}}</div>
                @enderror
            </div>

            <div class="form-floating mb-4">
                <textarea name="description" id="floatingTextarea" class=" form-control rounded-4 @error('description') is-invalid @enderror" placeholder="Leave a comment...">{{old('description',$post->description)}}</textarea>
                <label for="floatingTextarea2">Share Your Experience</label>
                @error('description')
                    <div class="invalid-feedback ps-2">{{$message}}</div>
                @enderror
            </div>

            <div class="border rounded-4 mb-3 p-3" id='gallery'>

                <div class="d-flex align-items-stretch ">
                    <div class="border px-5 me-2 d-flex justify-content-center align-items-center" id="upload-ui">
                        <i class="bi bi-cloud-upload"></i>
                    </div>
                    <div class="d-flex overflow-scroll">
                        {{-- @forelse($post->galleries as $gallery)
                            <div class="d-flex align-items-end me-2">
                                <img src="{{asset('storage/gallery'.$gallery->photo)}}" class='h-100' alt="">
                                <form action="{{route('gallery.destroy',$gallery->id)}}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <button class='btn btn-small btn-danger gallery-img-delete'>X</button>
                                </form>
                            </div>
                        @empty
                            
                        @endforelse --}}
                    </div>
                </div>

                <form action="{{ route('gallery.store') }}" method="post" id="gallery-upload" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="">
                        <input type="file" id="gallery-input"  name="galleries[]" class="d-none @error('galleries') is-invalid @enderror @error('galleries.*') is-invalid @enderror" multiple>
                        @error('galleries')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                        @error('galleries.*')
                        <div class="invalid-feedback ps-2">{{ $message }}</div>
                        @enderror
                    </div>
                </form>

            </div>


            <div class='text-center mb-4'>
                <button type="submit" class='btn btn-lg btn-outline-primary'>Update</button>
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
        })

        let uploadUi = document.getElementById('upload-ui');
        let galleryInput = document.getElementById('gallery-input');
        let galleryUpload = document.getElementById('gallery-upload');

        uploadUi.addEventListener('click',_=>galleryInput.click());
        galleryInput.addEventListener('change',_=>galleryUpload.submit());

    </script>
    
@endpush