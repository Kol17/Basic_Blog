@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-8">
            @auth
                <div class='d-flex align-item-center justify-content-between border rounded-3 mb-3 p-3'>
                    <h4 class='fw-bolder '>
                        Welcome<br/>
                     <span class='text-primary'>{{auth()->user()->name}}</span>   
                    </h4>
                    <div class='text-center'>
                    <a href="{{route('post.create')}}" class='btn btn-lg btn-outline-success btn-light '>Create New Post</a>
                    </div>
                </div>
            @endauth

            <div class="posts">
                @forelse($posts as $post)
                    <div class="post mb-3">
                        <div class="row border border-3 rounded-3 p-3">
                            <div class="col-lg-4">
                                <img src="{{asset("storage/cover/".$post->cover)}}" class="cover-img img-fluid rounded-2" alt="{{$post->cover}}">
                            </div>
                            <div class="col-lg-8">
                                <div class="d-flex justify-content-between h-350 py-4">
                                    <div >
                                        <h4 class="fw-bold">{{$post->title}}</h4>
                                        <p>{{$post->excerpt}}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <img src="{{asset($post->user->photo)}}" class="user-img rounded-circle" style="width: 50px;">
                                            <p class="small mb-0 ms-2">
                                                {{$post->user->name}}<br>
                                                {{$post->created_at->format("d M Y")}}
                                            </p>   
                                        </div>
                                        <a href="{{route('post.detail',$post->slug)}}" class="btn btn-outline-dark">Read More</a>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                @empty
                    <p class='fw-bold'>No Posts</p>
                @endforelse
            </div>
            

        </div>
    </div>
</div>
@endsection
