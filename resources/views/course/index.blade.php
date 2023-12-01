@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            
                <div class="card-body">
                <table class='table'>
                    <a href="{{route('course.create')}}" class='btn btn-primary mb-3'>Add new course</a>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Title</th>
                            <th>Programming Language</th>
                            <th>Lecturer</th>
                            <th>Duration (Month)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->language_id}}</td>
                            <td>{{$course->lecturer}}</td>
                            <td>{{$course->duration}}</td>
                            <td>
                                <a href="{{route("course.edit",$course->id)}}" class='btn btn-success'>Edit</a>
                                <form action="{{route("course.destroy",$course->id)}}" method='post' class='d-inline-block'>
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
