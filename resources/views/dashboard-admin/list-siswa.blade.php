
@extends('sidebar.sidebar');
@section('content')
    <div class="List p-3 container">
        <h3>Daftar Akun Siswa</h3>
        <div class="d-flex my-3">
          <a href="{{Route('addSiswa')}}" class="ms-auto">
            <button class="btn-add-custom ">+Add New</button>
          </a>
        </div>
    <table id="example" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NISN</th>
          <th>Email</th>
          <th>No.Telepon</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->NIS}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->address}}</td>
                <td><a href="/delete-siswa/{{$student->user_id}}" onclick="return confirm('Yakin?');"><i class='fas fa-trash-alt' style='font-size:20px;color:red'></i></a></td>
            </tr>
        @endforeach
      </tbody>
@endsection
