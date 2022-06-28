
@extends('sidebar.sidebar');
@section('content')
    <div class="List p-3 container">
        <h3>Daftar Akun Guru</h3>
        <div class="d-flex my-3">
          <a href="{{Route('addGuru')}}" class="ms-auto">
            <button class="btn-add-custom ">+Add New</button>
          </a>
        </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="example" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIP</th>
          <th>Email</th>
          <th>No.Telepon</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($teachers as $teacher)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->NIP}}</td>
            <td>{{$teacher->email}}</td>
            <td>{{$teacher->phone}}</td>
            <td>{{$teacher->address}}</td>
            <td><a href="/delete-guru/{{$teacher->user_id}}" onclick="return confirm('Yakin?');"><i class='fas fa-trash-alt' style='font-size:20px;color:red'></i></a></td>
        </tr>
        @endforeach
      </tbody>
@endsection
