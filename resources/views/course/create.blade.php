@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <form action="{{route("course.store")}}" method='post'>
                    @csrf
                <div class="form-group mb-3">
                <label>Course Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name='title' value="{{old('title')}}">
                @error('title')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Programming Language</label>
                    <select class="form-control" name="language_id" >
                    @foreach ($languages as $language)
                        <option value='{{$language->id}}'>{{$language->name}}</option>
                    @endforeach
                   </select>
                    @error('language_id')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Lecturer</label>
                    <input type="text" class="form-control @error('lecturer') is-invalid @enderror" name='lecturer' value="{{old('lecturer')}}">
                    @error('name')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label>Duration</label>
                    <input type="number" class="form-control @error('duration') is-invalid @enderror" name='duration' value="{{old('duration')}}">
                    @error('duration')
                        <small class='text-danger'>{{$message}}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Add</button>
                <a href="{{route("course.index")}}" class='btn btn-dark ml-3 mt-3'>Back</a>
                
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
