@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/course.css') }}">
@endsection
@section('content')
    <div class="course shadow p-3  rounded m-4">
        <h1 class="title-course">Course</h1>
        <div class="d-flex my-3">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <p class="m-2">
                        {{ session('success') }}
                    </p>
                </div>
            @endif
        </div>
        <div class="row row-cols-1 row-cols-md-2 ">
            @foreach ($courses as $cou)
                <div class="col">
                    <div class="card border border-primary">
                        <img src="{{ asset('thumbnail/' . $cou->thumbnail) }}" class="card-img-top img-course"
                            alt="..." />
                        <div class="card-body mt-">
                            <hr>
                            <h5 class="card-title">{{ $cou->nama_mapel }} <label for="">{{ $cou->nama_kelas }}
                                    {{ $cou->tahun_ajaran }}</label></h5>
                            <small class="text-success">{{ $cou->name }}</small><br>

                            <p class="card-text mt-1">
                                {{ $cou->deskripsi }}
                            </p>
                        </div>
                        <div class="course-action ">
                            <b><a href="/moduletugas/{{$cou->id}}" style="text-decoration: none;">
                                    <p class="action-item">See Detail</p>
                                </a></b>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection
