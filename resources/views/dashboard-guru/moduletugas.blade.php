@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/courseContent.css') }}">
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
        @if (session()->has('reset'))
            <div class="alert alert-success" role="alert">
                <p class="m-2">
                    {{ session('reset') }}
                </p>
            </div>
        @endif
        @if (session()->has('gagal_reset'))
            <div class="alert alert-danger" role="alert">
                <p class="m-2">
                    {{ session('gagal_reset') }}
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
                                <button class="btn-add m-4 position-absolute mr-auto">+Add Materi</button>
                            </div>

                            {{-- Tugas --}}
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <button class="btn-add m-4 position-absolute mr-auto">+Add tugas</button>
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
                                            {{-- @foreach ($course as $co) --}}
                                            <a href="#"><button type="button"
                                                    class="btn btn-danger">Reset</button></a>
                                            {{-- @endforeach --}}
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
                                                                    {{-- @foreach ($course as $co) --}}
                                                                    <input type="hidden" name="id_course"
                                                                        class="form-control" value="" />
                                                                    {{-- @endforeach --}}
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
                            {{-- @foreach ($nama as $na) --}}
                            <div class="namess border border-secondary border-opacity-75 m-2 rounded">
                                {{-- <p class="m-1 "><b>{{ $na->NIS }}</b> - {{ $na->name }} </p> --}}
                                <p class="m-1 "><b>NIS</b> - Nama </p>
                            </div>
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
