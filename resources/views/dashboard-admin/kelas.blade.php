@extends('sidebar.sidebar');
@section('content')
    <div class="col-md-10 container p-4 bg-light">
        <h1 class="title">Tambah Kelas</h1>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <p class="m-2">
                    {{ session('success') }}
                </p>
            </div>
        @endif
        <div class="form">
            <form action="{{ Route('add-kelas') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Nama kelas</label></label>
                    <input type="text" name="nama_kelas"
                        class="form-control  @error('NIS', 'post') is-invalid @enderror">
                    @error('NIP')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tahun ajaran</label></label>
                    <input type="text" name="tahun_ajaran"
                        class="form-control  @error('phone', 'post') is-invalid @enderror">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn-add-custom">Tambah</button>
            </form>
            <hr>
        </div>
        <h1 class="title mt-4">Daftar Kelas</h1>
        @foreach ($kelas as $k)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Tahun ajaran</th>
                        <th scope="col">Detail</th>
                        <th scope="col">edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach --}}
                    <tr>
                        </th>
                        <td>{{ $k->nama_kelas }}</td>
                        <td>{{ $k->tahun_ajaran }}</td>
                        <td><a href="detail-kelas/{{ $k->id }}"><button type="button"
                                    class="btn btn-sm btn-success">Detail</button></a></td>
                        <td><i class="fas fa-edit action-item" style="font-size: 20px; color: blue" data-bs-toggle="modal"
                                data-bs-target="#edit{{ $k->id }}"></i></td>
                        <td>
                            <a href="/hapus-kelas/{{ $k->id }}">
                                <li class="fas fa-trash-alt action-item" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" style="font-size: 20px; color: red"></li>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="edit{{ $k->id }}" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/edit-kelas/{{ $k->id }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama kelas</label>
                                            <input type="text" name="nama_kelas" class="form-control"
                                                value="{{ $k->nama_kelas }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama tahun ajaran</label>
                                            <input type="text" name="tahun_ajaran" class="form-control"
                                                value="{{ $k->tahun_ajaran }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        @endforeach
    </div>
    </div>
@endsection
