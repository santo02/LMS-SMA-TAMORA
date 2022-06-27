@extends('sidebar.sidebar');
@section('content')
<div class="div">
    <div class="div">
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
                <input type="text" name="phone"class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No.telp</label></label>
                <input type="text" name="email"class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label></label>
                <input type="text" name="address"class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label></label>
                <input type="text" name="username"class="form-control" id="exampleInputEmail1">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

