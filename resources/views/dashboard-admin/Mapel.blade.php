@extends('sidebar.sidebar');
@section('content')
    <div class="form">

        <div class="col-md-10 container bg-light">
            <h1 class="title p-3">Mata Pelajaran</h1>
            <hr>
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <p class="m-2">
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            <div class="add-form p-4">
                <h3 class="title mb-4">Tambah Mata pelajaran</h3>
                <form action="{{ Route('add-mapel') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Mata Pelajaran</label></label>
                        <input type="text" name="mapel"
                            class="form-control  @error('name', 'post') is-invalid @enderror">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn-add-custom mb-4">Tambah</button>
                </form>
                <hr>
            </div>
            <div class="list mt-4 p-4">
                <h3 class="title mb-4">List Mata pelajaran</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mata pelajaran</th>
                            <th scope="col">edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapel as $m)
                            <tr>
                                </th>
                                <td>{{ $m->nama_mapel }}</td>
                                <td><i class="fas fa-edit action-item" style="font-size: 20px; color: blue"
                                        data-bs-toggle="modal" data-bs-target="#edit{{ $m->id }}"></i></td>
                                {{-- <td>
                                    <li class="fas fa-trash-alt action-item" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" style="font-size: 20px; color: red"></li>
                                </td> --}}
                            </tr>
                            <div class="modal fade" id="edit{{ $m->id }}" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/edit-mapel/{{ $m->id }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nama Mata
                                                        Pelajaran</label></label>
                                                    <input type="text" name="mapels" class="form-control"
                                                        value="{{ $m->nama_mapel }}">

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
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
