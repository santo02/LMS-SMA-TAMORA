@extends('sidebar.sidebar');
@section('content')
    <h1 class="title">Tambah Akun Guru</h1>
    <div class="col-md-10 container mt-4 mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <p class="m-2">
                    {{ session('success') }}
                </p>
            </div>
        @endif
        <form action="{{ Route('addGuruProses') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nama Lengkap</label></label>
                <input type="text" name="name" class="form-control  @error('name', 'post') is-invalid @enderror">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">NIP</label></label>
                <input type="text" name="NIP" class="form-control  @error('NIS', 'post') is-invalid @enderror">
                @error('NIP')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label></label>
                <input type="text" name="email"class="form-control  @error('email', 'post') is-invalid @enderror">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">No.Handphone</label></label>
                <input type="text" name="phone" class="form-control  @error('phone', 'post') is-invalid @enderror">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tanggal Lahir</label></label>
                <input type="date" name="birth_date"
                    class="form-control  @error('birth_date', 'post') is-invalid @enderror">
                @error('birth_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jenis Kelamin</label></label>
                <select name="gender" id="" class="form-select"
                    class="form-control  @error('gender', 'post') is-invalid @enderror">
                    <option value="">Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Alamat</label></label>
                <input type="text" name="address" class="form-control  @error('address', 'post') is-invalid @enderror">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn-add-custom mb-4">Submit</button>
        </form>
    </div>
@endsection
