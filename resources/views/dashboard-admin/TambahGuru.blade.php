@extends('sidebar.sidebar');
@section('content')
<h1 class="title">Tambah Akun Guru</h1>
    <div class="col-md-10 container mt-4 mb-4">

        <form action="{{Route('addGuruProses')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInput1" class="form-label">Nama Lengkap</label></label>
                <input type="text" name="name" class="form-control" id="exampleInput1">
            </div>
            <div class="mb-3">
                <label for="exampleInput2" class="form-label">NIP</label></label>
                <input type="text" name="NIP" class="form-control" id="exampleInput2">
            </div>
            <div class="mb-3">
                <label for="exampleInput3" class="form-label">Email</label></label>
                <input type="text" name="email"class="form-control" id="exampleInput3">
            </div>
            <div class="mb-3">
                <label for="exampleInput4" class="form-label">No.telp</label></label>
                <input type="text" name="phone"class="form-control" id="exampleInput4">
            </div>
            <div class="mb-3">
                <label for="exampleInput5" class="form-label">Username</label>
                <input type="text" name="username"class="form-control" id="exampleInput5">
            </div>
            <div class="mb-3">
                <label for="exampleInput6" class="form-label">Alamat</label>
                <input type="text" name="address"class="form-control" id="exampleInput6">
            </div>
            <button type="submit" class="btn-add-custom mb-4">Submit</button>
        </form>
    </div>
@endsection
