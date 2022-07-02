@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
@endsection
@section('content')
<h1 class="title-course">Course</h1>
<div class="row row-cols-1 row-cols-md-2 g-4 container">
    @foreach ($courses as $course)
    <div class="col">
        <div class="card">
            <img src="{{ asset('thumbnail/'.$course->thumbnail) }}" class="card-img-top img-course" alt="..." />
            <div class="card-body">
                <a href="/detailcourse/{{$course->id}}"><h5 class="card-title">{{ $course->title }}</h5></a>
                <p class="card-text">
                    {{ $course->deskripsi }}
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
