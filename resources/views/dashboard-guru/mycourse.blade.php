@extends('sidebar.sidebar')
@section('content')
    <h1 class="title-course">My Course</h1>
    <div class="d-flex my-3">
        <a class="ms-auto">
            <button class="btn-add-custom" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">
                +Add New
            </button>
        </a>
        <div class="modal" id="exampleModalAdd" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('add-course') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label required">Judul</label>
                                <input type="text" name="title" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Jurusan</label>
                                <select class="form-select" name="jurusan" aria-label="Default select example">
                                    <option selected>pilih jurusan</option>
                                    <option value="MIA">MIA</option>
                                    <option value="IIS">IIS</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Deskripsi</label>
                                <textarea type="text" name="desk" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Minggu Ke-</label>
                                <select class="form-select" name="minggu" aria-label="Default select example">
                                    <option selected>Minggu ke-</option>
                                        @for ($i = 1; $i < 17; $i++)
                                         <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Enroll Key</label>
                                <input type="text" name="key" class="form-control" />
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <button type="reset" data-bs-dismiss="modal" class="btn btn-danger">Cancel</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 shadow p-3  rounded m-4">
        @foreach ($courses as $course)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('thumbnail/'.$course->thumbnail) }}" class="card-img-top img-course" alt="..." />
                    <div class="card-body mt-">
                        <hr>
                        <a href="moduletugas/{{$course->id}}"><h5 class="card-title">{{ $course->title }}</h5></a>
                        <p class="card-text">
                            {{ $course->deskripsi }}
                        </p>
                    </div>
                    <div class="course-action mt--4">
                        <li class="fas fa-trash-alt action-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="font-size: 20px; color: red"></li>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Konfirmasi
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus course ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancel
                                        </button>
                                        <a href="/delete-course/{{ $course->id }}"><button type="button"
                                                class="btn btn-primary">Yes</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <i class="fas fa-edit action-item" style="font-size: 20px; color: blue" data-bs-toggle="modal"
                            data-bs-target="#myModal{{$course->id}}"></i>
                        <div class="modal" id="myModal{{$course->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Course</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ Route('edit-course') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_course" value="{{$course->id}}"/>
                                            <div class="mb-3">
                                                <label class="form-label required">Judul</label>
                                                <input type="text" class="form-control" name="title"
                                                    value="{{ $course->title }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Thumbnail</label>
                                                <input type="file" class="form-control" name="thumbnail"
                                                    value="{{ asset('thumbnail/'.$course->thumbnail) }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Jurusan</label>
                                                <select class="form-select" aria-label="Default select example" name="jurusan">
                                                    <option >pilih jurusan</option>
                                                    <option value="1"  @if($course->minggu == 1) selected @endif>MIA</option>
                                                    <option value="2"  @if($course->minggu == 2) selected @endif>IIS</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Deskripsi</label>
                                                <input type="text" class="form-control" name="desk"
                                                    value="{{ $course->deskripsi }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Minggu Ke-</label>
                                                <select class="form-select" name="minggu" aria-label="Default select example">
                                                    <option>Minggu Ke-</option>
                                                        @for ($i = 1; $i < 17; $i++)
                                                         <option value="{{$i}}" @if($course->minggu == $i) selected @endif>{{$i}}</option>
                                                        @endfor
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Enroll Key</label>
                                                <input type="text" class="form-control" name="key"
                                                    value="{{ $course->enroll_key }}" />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">
                                                    Save Change
                                                </button>
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-danger">Cancel</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
