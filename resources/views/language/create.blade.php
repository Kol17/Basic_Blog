@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <form action="{{route("language.store")}}" method='post'>
                    @csrf
                <div class="form-group">
                <label class='mb-3'>Programming Language</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name='name'>
                @error('name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Add</button>
                <a href="{{route("language.index")}}" class='btn btn-dark ml-3 mt-3'>Back</a>
                
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
