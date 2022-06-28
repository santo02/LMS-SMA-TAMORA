@extends('sidebar.sidebar');
@section('content')
<div class="div">
    <h1 class="title">Tambah Akun Siswa</h1>
    <div class="col-md-10 container mt-4 mb-4">

        <form action="{{Route('addSiswaProses')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label></label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NIS</label></label>
                <input type="text" name="NIS" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label></label>
                <input type="text" name="email"class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No.telp</label></label>
                <input type="text" name="phone"class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label></label>
                <input type="text" name="username"class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label></label>
                <input type="text" name="address"class="form-control" id="exampleInputEmail1">
            </div>


            <button type="submit" class="btn-add-custom mb-4">Submit</button>
        </form>
    </div>
@endsection

