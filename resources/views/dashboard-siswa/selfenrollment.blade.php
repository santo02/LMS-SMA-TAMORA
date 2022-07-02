@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
@endsection
@section('content')
    <h1 class="title-course">Course</h1>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        <p class="m-2">
            {{ session('success') }}
        </p>
    </div>
@endif
@if (session()->has('gagal'))
    <div class="alert alert-danger" role="alert">
        <p class="m-2">
            {{ session('gagal') }}
        </p>
    </div>
@endif
    <div class="row row-cols-1 row-cols-md-2 g-4 content">
        @foreach ($courses as $cou)
            <div class="col">
                <div class="card enroll-card">
                    <img src="{{ asset('thumbnail/' . $cou->thumbnail) }}" class="card-img-top img-course" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">{{ $cou->title }}</h5>
                        <p class="card-text">
                            {{ $cou->deskripsi }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="right">
                <h1 class="title-key">Self Enrollment :</h1>\
                <form action="/enroll-proses/{{$cou->id}}" method="POST">
                    @csrf
                    <input type="text" name="key-enroll" class="form-control w-50" id="formGroupExampleInput" />
                    <div class="d-flex my-3">
                        <a>
                            <button class="btn-add-custom">Enroll me</button>
                        </a>
                    </div>
            </div>
            </form>
        @endforeach
    </div>
@endsection
