@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/courseContent.css') }}">
@endsection
@section('content')
    <div class="CourseContent">
        <h1 class="title-course">Fisika Dasar 1</h1>
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
                                    <a href="{{ Route('materi', ['id' => $course[0]->id, 'week' => $i]) }}">
                                        <p class="mt-3">Materi Minggu Ke-{{ $i }}</p>
                                    </a>
                                    <a href="{{ Route('add-materi', ['id' => $course[0]->id, 'week' => $i]) }}">
                                        <button class="btn-add">+Add Materi</button>
                                    </a>
                                    <hr>
                                @endfor
                                {{-- -- @if ($mod->week == 2)
                                    <p>topik minggu 2</p>
                                    <a href="{{ Route('materi', ['id'=>$co->id, 'week'=>$mod->week]) }}"><p>{{$mod->topic}}</p></a>
                                    <a href="{{ Route('add-materi', $co->id) }}">
                                        <button class="btn-add">+Add Materi</button>
                                    </a>
                                    <hr> --}}
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
                <div class="enrollment-bar">
                    <div class="right-box">
                        <div class="thead-enroll">
                            <h1 class="enroll-title">Enrolled Students</h1>
                            <li class="fas fa-cog set-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                style="font-size: 20px"></li>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Option</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <button type="button" class="btn btn-danger">Reset</button>
                                            <button type="button" class=" btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                Enroll Student
                                            </button>
                                            <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Enroll Student</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ Route('enroll') }}" method="POST">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label class="form-label required">NIS</label>
                                                                    <input type="text" name="NIS"
                                                                        class="form-control" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label required">Name</label>
                                                                    <input type="text"
                                                                        name="name"class="form-control" />
                                                                </div>
                                                                <div class="mb-3">
                                                                    @foreach ($course as $co)
                                                                        <input type="hidden" name="id_course"
                                                                            class="form-control"
                                                                            value="{{ $co->id }}" />
                                                                    @endforeach
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Save Change
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-enroll bg-light">
                            @foreach ($nama as $na)
                                <div class="namess border border-secondary border-opacity-75 m-2 rounded">
                                    <p class="m-1 "><b>{{ $na->NIS }}</b> - {{ $na->name }} </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
