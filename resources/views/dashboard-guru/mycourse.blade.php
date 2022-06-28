@extends('sidebar.sidebar')
@section('content')
    <h1 class="title-course">My Course</h1>
    <div class="d-flex my-3">
        <a class="ms-auto">
            <button class="btn-add-custom" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">
                +Add New
            </button>
        </a>
        <div class="modal" id="exampleModalAdd">
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
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($courses as $course)
            <div class="col">
                <div class="card">

                    <img src="{{ Storage::url($course->thumbnail) }}" class="card-img-top img-course" alt="..." />
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">
                            {{ $course->deskripsi }}
                        </p>
                    </div>
                    <div class="course-action">
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
                            data-bs-target="#myModal"></i>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Course</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ Route('edit-course', $course->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label required">Judul</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $course->title }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Thumbnail</label>
                                                <input type="file" class="form-control"
                                                    value="{{ Storage::url($course->thumbnail) }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Jurusan</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>pilih jurusan</option>
                                                    <option value="1">MIA</option>
                                                    <option value="2">IIS</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Deskripsi</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $course->deskripsi }}" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Enroll Key</label>
                                                <input type="text" class="form-control"
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
