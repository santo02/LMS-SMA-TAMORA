@extends('sidebar.sidebar')
@section('content')
    <div class="course shadow p-3  rounded m-4">
        <h1 class="title-course">Course</h1>
        <div class="d-flex my-3">
            <a class="ms-auto">
                <button class="btn-add-custom" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">
                    Tambah Course
                </button>
            </a>
            <div class="modal" id="exampleModalAdd">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">Mata pelajaran</label>
                                    <select class="form-select  @error('mapel', 'post') is-invalid @enderror" name="mapel"
                                        aria-label="Default select example">
                                        <option selected>pilih mata pelajaran</option>
                                        <option value="MIA">MIA</option>
                                        <option value="IIS">IIS</option>
                                    </select>
                                    @error('mapel')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Kelas</label>
                                    <select class="form-select  @error('kelas', 'post') is-invalid @enderror" name="kelas"
                                        aria-label="Default select example">
                                        <option selected>pilih Kelas</option>
                                        <option value="MIA">MIA</option>
                                        <option value="IIS">IIS</option>
                                    </select>
                                    @error('kelas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Pengajar</label>
                                    <select class="form-select  @error('pengajar', 'post') is-invalid @enderror"
                                        name="pengajar" aria-label="Default select example">
                                        <option selected>Pilih Pengajar</option>
                                        <option value="MIA">MIA</option>
                                        <option value="IIS">IIS</option>
                                    </select>
                                    @error('pengajar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Thumbnail</label>
                                    <input type="file" name="thumbnail"
                                        class="form-control  @error('thumbnail', 'post') is-invalid @enderror">
                                    @error('thumbnail')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Deskripsi</label>
                                    <input type="text" name="deskripsi"
                                        class="form-control  @error('deskripsi', 'post') is-invalid @enderror">
                                    @error('deskripsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
        <div class="row row-cols-1 row-cols-md-2 ">
            {{-- @foreach ($courses as $course) --}}
            <div class="col">
                <div class="card">
                    {{-- {{ asset('thumbnail/'.$course->thumbnail) }} --}}
                    <img src="" class="card-img-top img-course" alt="..." />
                    <div class="card-body mt-">
                        <hr>
                        <h5 class="card-title">Judul course</h5>
                        <label for="">kelas</label>
                        <p class="card-text mt-1">
                            Deskripsi
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
                                        <a href="#"><button type="button" class="btn btn-primary">Yes</button></a>
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
                                        <form action="#" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label required">Mata pelajaran</label>
                                                <select class="form-select  @error('mapel', 'post') is-invalid @enderror"
                                                    name="mapel" aria-label="Default select example">
                                                    <option selected>pilih mata pelajaran</option>
                                                    <option value="MIA">MIA</option>
                                                    <option value="IIS">IIS</option>
                                                </select>
                                                @error('mapel')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Kelas</label>
                                                <select class="form-select  @error('kelas', 'post') is-invalid @enderror"
                                                    name="kelas" aria-label="Default select example">
                                                    <option selected>Pilih Kelas</option>
                                                    <option value="MIA">MIA</option>
                                                    <option value="IIS">IIS</option>
                                                </select>
                                                @error('kelas')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Pengajar</label>
                                                <select
                                                    class="form-select  @error('pengajar', 'post') is-invalid @enderror"
                                                    name="pengajar" aria-label="Default select example">
                                                    <option selected>Pilih Pengajar</option>
                                                    <option value="MIA">MIA</option>
                                                    <option value="IIS">IIS</option>
                                                </select>
                                                @error('pengajar')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Thumbnail</label>
                                                <input type="file" name="thumbnail"
                                                    class="form-control  @error('thumbnail', 'post') is-invalid @enderror">
                                                @error('thumbnail')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Deskripsi</label>
                                                <input type="text" name="deskripsi"
                                                    class="form-control  @error('deskripsi', 'post') is-invalid @enderror">
                                                @error('deskripsi')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>



                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Create</button>
                                                <button type="reset" data-bs-dismiss="modal"
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
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
