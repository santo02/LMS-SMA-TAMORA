@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/courseContent.css') }}">
@endsection
@section('content')
    <div class="CourseContent">
        @foreach ($course as $c)
            <h2 class="sub-title">Course Content {{ $c->nama_mapel }}</h2>
        @endforeach
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
                    <div class="main-content container">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Materi</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Tugas</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            {{-- Materi --}}
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                @foreach ($materi as $m)
                                    <div class="materi mt-4 p-2">
                                        <small>{{ $m->T_mulai }} - {{ $m->T_akhir }}</small>
                                        <a href="/detail-materi-siswa/{{ $m->id }}" style="text-decoration: none">
                                            <h5>{{ $m->topik }}</h5>
                                        </a>
                                        <h6> Bab:{{ $m->bab }}</h6>
                                        <hr>
                                    </div>
                                @endforeach
                                <hr>
                            </div>

                            {{-- Tugas --}}
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                @foreach ($tugas as $t)
                                    <div class="materi mt-4 p-2">
                                        <small>{{ $t->T_mulai }} - {{ $t->T_akhir }}</small>
                                        <a href="/detail-tugas-siswa/{{ $t->id }}" style="text-decoration: none">
                                            <h5>{{ $t->topik }}</h5>
                                        </a>
                                        <h6> Bab:{{ $t->bab }}</h6>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="enrollment-bar">
                    <div class="right-box">
                        <div class="thead-enroll">
                            <h1 class="enroll-title p-2">Daftar Anggota Kelas</h1>
                        </div>
                        <div class="list-enroll bg-light">
                            @foreach ($siswa as $s)
                                <div class="namess border border-secondary border-opacity-75 m-2 rounded">
                                    <p class="m-1 "><b>{{ $s->NIS }}</b> - {{ $s->name }} </p>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
