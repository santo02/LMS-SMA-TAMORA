@extends('sidebar.sidebar');
@section('content')
    <div class="List p-3 container">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <p class="m-2">
                    {{ session('success') }}
                </p>
            </div>
        @endif
        <h3>Daftar Akun Guru</h3>
        <div class="d-flex flex-row-reverse my-3">
            <a href="#" class="p-2">
                <button class="btn-im-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">import Guru</button>
            </a>
            <a href="{{Route('export-guru')}}" class="p-2">
                <button class="btn-ex-custom ">export Guru</button>
            </a>
            <a href="{{ Route('addGuru') }}" class="p-2">
                <button class="btn-add-custom ">Tambah Guru</button>
            </a>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('import-guru') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" id="excel">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>No.Telepon</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->NIP }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->gender }}</td>
                        <td>{{ $teacher->birth_date }}</td>
                        <td>{{ $teacher->address }}</td>
                        <td>{{ $teacher->status }}</td>
                        <td><a href="/delete-guru/{{ $teacher->user_id }}" onclick="return confirm('Yakin?');"><i
                                    class='fas fa-trash-alt' style='font-size:20px;color:red'></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        @endsection
