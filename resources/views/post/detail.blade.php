@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            <div class="post">
                <div class="row">
                    <label class='fs-3 fw-bold'>{{$post->title}}</label>
                    <div class="col-lg-4 align-self-center">            
                            <img src="{{asset('storage/cover/'.$post->cover)}}" class='cover-img img-fluid offset-md-10 border border-dark rounded-3' alt="{{$post->cover}}">    
                    </div>
                    <p class="fst-italic">{{$post->description}}</p>

                    <div class="d-flex justify-content-between align-items-center border rounded p-3 mb-3">
                        <div class="d-flex">
                            <div class="col-lg-3">
                                <img src="{{asset($post->user->photo)}}" class="user-img me-5 rounded-circle" alt="user_img" style="width:35px;height:auto;">
                            </div>
                            <p class="fw-bold small">{{$post->user->name}}<br>
                            {{$post->user->created_at->format("d M Y")}}
                            </p>
                        </div>
                        <div>
                            <form action="{{route('post.destroy',$post->id)}}" method='post' class='d-inline-block'>
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger">Delete</button>
                            </form>
                            <a href="{{route('post.edit',$post->id)}}" class="btn btn-outline-primary">Edit</a>
                            <a href="{{route('index')}}" class="btn btn-outline-info">Read all</a>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <h4 class="text-center fw-bold mb-4">User Comments</h4>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="comments">
                            @forelse ($post->comments as $comment)
                                <div class="border rounded p-3 mb-3">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div class="d-flex">
                                            <img src="{{ asset($comment->user->photo)}}" class="user-img rounded-circle" alt="" style="width:30px;">
                                            <p class="mb-0 ms-2 small">
                                                {{ $comment->user->name}}
                                                <br>
                                                <i class='fas fa-calendar'></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </p>
                                        </div>

                                        <p class="mb-0">
                                        {{ $comment->message }}
                                        </p>

                                        <form action="{{ route('comment.destroy',$comment->id)}}" method='post'>
                                            @csrf
                                            @method('delete')
                                            <button class='btn btn-sm btn-outline-danger rounded-circle'>
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                
                                    </div>
                                    
                                </div>


                            @empty
                                <p class="text-center">
                                    There is no comment yet !
                                </p>
                            @endforelse


                        </div>

                    @auth
                        <form action="{{ route('comment.store')}}" method="post" id="comment-create">
                            @csrf
                            <input type="hidden" name='post_id' value="{{ $post->id }}">
                            <div class="form-floating mb-3">
                                <textarea name="message" placeholder="Leave a comment" class="form-control @error('message') is-invalid @enderror "></textarea>
                                <label for="floatingTextarea">Comments</label>
                                @error("message")
                                    <div class="invalid-feedback ps-2">{{$message}}</div>
                                @enderror
                                <div class="text-center mt-2">
                                    <button class="btn btn-outline-info ">Comment</button>
                                </div>
                            </div>
                    </form>
                    @endauth
                     
                    </div>
                </div>

            </div>
            
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
    </script>
    
@endpush