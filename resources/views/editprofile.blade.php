@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/edit_profile.css') }}">
@endsection
@section('content')
<h3 class="p-4">Edit Profile</h3>
<div class="container mt-2 bg-light p-4">

  <div class="row">
    <div class="col-5">
      <h3 class="caption2">Edit Profile</h3>
      <div>
        @foreach($users as $us)
        <div class="form-group">
          <label for="formGroupExampleInput">Nama Lengkap</label>
          <input type="text" value="{{$us->name}}" name="name"class="form-control" id="formGroupExampleInput" />
        </div>
        @foreach ($role as $ro)
            @if($ro == 'teacher')
            <div class="form-group pt-1">
                <label for="formGroupExampleInput">NIP</label>
                <input type="text" value="{{$us->nip}}" name="nip" class="form-control" id="formGroupExampleInput" />
              </div>
            @elseif($ro == 'student')
            <div class="form-group pt-1">
                <label for="formGroupExampleInput">NIS</label>
                <input type="text" value="{{$us->nis}}" name="nis" class="form-control" id="formGroupExampleInput" />
              </div>
            @endif
        @endforeach
        <div class="form-group pt-1">
          <label for="formGroupExampleInput">Email</label>
          <input type="email" class="form-control" value="{{$us->email}}" name="email"id="formGroupExampleInput" />
        </div>
        <div class="form-group pt-1">
          <label for="formGroupExampleInput">No.Telepon</label>
          <input type="text" class="form-control" value="{{$us->phone}}" name="phone" id="formGroupExampleInput" />
        </div>
        <div class="form-group pt-1">
          <label for="formGroupExampleInput">Alamat</label>
          <input type="text" class="form-control" value="{{$us->address}}" name="addres"id="formGroupExampleInput" />
        </div>
        <div class="d-flex my-3">
          <button type="button" class="btn-simpan">Simpan</button>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-2">
    </div>
    <div class="col-5">
      <h3 class="caption2"> Ubah Password</h3>
      <div>
        <div class="form-group">
          <label for="formGroupExampleInput">Password Baru</label>
          <input type="password" class="form-control" id="formGroupExampleInput" />
        </div>
        <div class="form-group pt-2">
          <label for="formGroupExampleInput">Re-Entry Password</label>
          <input type="password" class="form-control" id="formGroupExampleInput" />
        </div>
        <div class="d-flex my-3">
          <button type="button" class="btn-simpan">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
