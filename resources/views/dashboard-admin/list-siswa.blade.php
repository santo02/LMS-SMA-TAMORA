@extends('sidebar.sidebar');
@section('content')
    <div class="List p-3 container">
        <h3>Daftar Akun Siswa</h3>

        @if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif

		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

        @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <p class="m-2">
                        {{ session('success') }}
                    </p>
                </div>
            @endif
        <div class="d-flex flex-row-reverse my-3">
            <a href="#" class="p-2">
                <button class="btn-im-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">Import siswa</button>
            </a>
            <a href="{{Route('export-siswa')}}" class="p-2">
                <button class="btn-ex-custom ">Export siswa</button>
            </a>
            <a href="{{ Route('addSiswa') }}" class="p-2">
                <button class="btn-add-custom ">Tambah Siswa</button>
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
                        <form action="{{ Route('import-siswa') }}" method="POST" enctype="multipart/form-data">
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
                    <th>NISN</th>
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
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->NIS }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->birth_date }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->status }}</td>
                        <td><a href="/delete-siswa/{{ $student->user_id }}" onclick="return confirm('Yakin?');"><i
                                    class='fas fa-trash-alt' style='font-size:20px;color:red'></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        @endsection
