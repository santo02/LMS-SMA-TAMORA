@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
@endsection
@section('content')
    <div class="CourseContent">
        <h2 class="sub-title">Course Content</h2>
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
        <div>
            <div class="out-box">
                <div class="content-box">
                    <div class="main-content">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                    Materi
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    Tugas
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                @for ($i = 1; $i < 17; $i++)
                                    <a href="{{ Route('module-detail', ['id' => $course[0]->id, 'week' => $i]) }}">
                                        <p class="mt-3">Materi Minggu Ke-{{ $i }}</p>
                                    </a>
                                    <a href="{{ Route('add-materi', ['id' => $course[0]->id, 'week' => $i]) }}">

                                    </a>
                                    <hr>
                                @endfor

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div>
                                    <h1 class="week-title">Tugas week 1</h1>
                                    <p>Sesi 1 : <a href="">Termodinamika</a></p>
                                    <button class="btn-add">+Add Tugas</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
