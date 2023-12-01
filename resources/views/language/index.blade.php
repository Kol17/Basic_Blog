@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            
                <div class="card-body">
                <table class='table'>
                    <a href="{{route('language.create')}}" class='btn btn-primary mb-3'>Add new language</a>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Programming Language</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($languages as $language)
                        <tr>
                            <td>{{$language->id}}</td>
                            <td>{{$language->name}}</td>
                            <td>
                                <a href="{{route("language.edit",$language->id)}}" class='btn btn-success'>Edit</a>
                                <form action="{{route("language.destroy",$language->id)}}" method='post' class='d-inline-block'>
                                    @csrf
                                    @method('delete')
                                    <button class='btn btn-danger'>Delete</button>
                                </form>
                            </td>
                        </tr>  
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
