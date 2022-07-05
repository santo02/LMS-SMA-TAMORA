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
                            <form action="{{ Route('add-course') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">Mata pelajaran</label>
                                    <select class="form-select  @error('mapel', 'post') is-invalid @enderror" name="mapel"
                                        aria-label="Default select example">
                                        <option value="" selected>pilih mata pelajaran</option>
                                        @foreach ($mapel as $m)
                                            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                    @error('mapel')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Kelas</label>
                                    <select class="form-select  @error('kelas', 'post') is-invalid @enderror" name="kelas"
                                        aria-label="Default select example">
                                        <option selected value="">pilih Kelas</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama_kelas }} {{ $k->tahun_ajaran }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label required">Pengajar</label>
                                    <select class="form-select  @error('pengajar', 'post') is-invalid @enderror"
                                        name="pengajar" aria-label="Default select example">
                                        <option value="" selected>Pilih Pengajar</option>
                                        @foreach ($guru as $t)
                                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                                        @endforeach

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
            @foreach ($courses as $cou)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('thumbnail/' . $cou->thumbnail) }}" class="card-img-top img-course"
                            alt="..." />
                        <div class="card-body mt-">
                            <hr>
                            <h5 class="card-title">{{ $cou->nama_mapel }}  <label for="">{{ $cou->nama_kelas }} {{ $cou->tahun_ajaran }}</label></h5>
                            <small class="text-success">{{ $cou->name }}</small><br>
                            <p class="card-text mt-1">
                                {{ $cou->deskripsi }}
                            </p>
                        </div>
                        <div class="course-action mt--4">
                            <a data-bs-toggle="modal" data-bs-target="#delete{{$cou->id}}"><i class="fas fa-trash set-item" style="font-size: 20px; color:red"></i></a>
                            <!-- Modal -->
                            <div class="modal fade" id="delete{{$cou->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                Batal
                                            </button>
                                            <a href="/delete-course/{{$cou->id}}"><button type="button" class="btn btn-primary">Ya</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <i class="fas fa-edit action-item" style="font-size: 20px; color: blue"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $cou->id }}"></i>
                            <div class="modal" id="edit{{ $cou->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Course</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/edit-course/{{ $cou->id }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label required">Mata pelajaran</label>
                                                    <select
                                                        class="form-select  @error('mapel', 'post') is-invalid @enderror"
                                                        name="mapel" aria-label="Default select example">
                                                        <option value="">pilih mata pelajaran</option>
                                                        @foreach ($mapel as $m)
                                                            <option value="{{ $m->id }}"
                                                                @if ($m->id == $cou->mapel) selected @endif>
                                                                {{ $m->nama_mapel }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('mapel')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Kelas</label>
                                                    <select
                                                        class="form-select  @error('kelas', 'post') is-invalid @enderror"
                                                        name="kelas" aria-label="Default select example">
                                                        <option value="">Pilih Kelas</option>
                                                        @foreach ($kelas as $k)
                                                            <option value="{{ $k->id }}"
                                                                @if ($k->id == $cou->kelas) selected @endif>
                                                                {{ $k->nama_kelas }} {{ $k->tahun_ajaran }}</option>
                                                        @endforeach
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
                                                        <option value="">Pilih Pengajar</option>
                                                        @foreach ($guru as $g)
                                                            <option value="{{ $g->id }}"
                                                                @if ($g->id == $cou->pengajar) selected @endif>
                                                                {{ $g->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('pengajar')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Thumbnail</label>
                                                    <input type="file" name="thumbnail" value="{{ $cou->thumbnail }}"
                                                        class="form-control  @error('thumbnail', 'post') is-invalid @enderror">
                                                    @error('thumbnail')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Deskripsi</label>
                                                    <input type="text" name="deskripsi"
                                                        value="{{ $cou->deskripsi }}"
                                                        class="form-control  @error('deskripsi', 'post') is-invalid @enderror">
                                                    @error('deskripsi')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="reset" data-bs-dismiss="modal"
                                                        class="btn btn-danger">Batal</button>
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
    </div>
@endsection
