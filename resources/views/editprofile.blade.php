@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/edit_profile.css') }}">
@endsection
@section('content')
    <div class="container mt-2 bg-light p-4">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <p class="m-2">
                {{ session('success') }}
            </p>
        </div>
    @endif
        @foreach ($users as $us)
            <div class="gambar mb-4 p-3">
                @if ($us->foto == 'profile.png')
                    <div class="upload">
                        <img src="image/profile.png" width="150" height="150" alt="">
                        <div class="round">
                            <i class="fa fa-camera" data-bs-target="#edit{{ $us->id }}" data-bs-toggle="modal"
                                style="color: #fff;"></i>
                        </div>
                    </div>
                @else
                    <div class="upload">
                        <img src="{{ asset('Fotoprofile/'.$us->foto) }}" width="150" height="150" alt="">
                        <div class="round">
                            <i class="fa fa-camera" data-bs-target="#edit{{ $us->id }}" data-bs-toggle="modal"
                                style="color: #fff;"></i>
                        </div>
                    </div>
                @endif
            </div>

            <div class="modal" id="edit{{ $us->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit foto profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/editgambar/{{ $us->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label required">Gambar</label>
                                    <input type="file" name="file" value="{{ $us->foto }}"
                                        class="form-control  @error('file', 'post') is-invalid @enderror">
                                    @error('file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row p-4">
                <div class="col-5">
                    <h3 class="caption2">Edit Profile</h3>
                    <!-- Alert message (start) -->
                    @if (Session::has('message'))
                        <div class="alert {{ Session::get('alert-class') }}">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <!-- Alert message (end) -->
                    <form action="{{ route('updateProfileProses', [$us->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div>
                            <div class="form-group">
                                <small for="formGroupExampleInput">Nama Lengkap<span class="required">*</span></small>
                                <input type="text" value="{{ $us->name }}" name="name"class="form-control"
                                    id="formGroupExampleInput" />
                                @if ($errors->has('name'))
                                    <span class="errormsg">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            @foreach ($role as $ro)
                                @if ($ro == 'teacher')
                                    <div class="form-group pt-1">
                                        <small for="formGroupExampleInput">NIP<span class="required">*</span></small>
                                        <input type="text" value="{{ $us->nip }}" name="NIP"
                                            class="form-control" id="formGroupExampleInput" />
                                    </div>
                                @elseif($ro == 'student')
                                    <div class="form-group pt-1">
                                        <small for="formGroupExampleInput">NIS<span class="required">*</span></small>
                                        <input type="text" value="{{ $us->nis }}" name="NIS"
                                            class="form-control" id="formGroupExampleInput" />
                                        @if ($errors->has('NIS'))
                                            <span class="errormsg">{{ $errors->first('NIS') }}</span>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                            <div class="form-group pt-1">
                                <small for="formGroupExampleInput">Email<span class="required">*</span></small>
                                <input type="email" class="form-control" value="{{ $us->email }}"
                                    name="email"id="formGroupExampleInput" />
                            </div>
                            <div class="form-group pt-1">
                                <small for="formGroupExampleInput">Tanggal Lahir<span class="required">*</span></small>
                                <input type="date" class="form-control" value="{{ $us->birth_date }}"
                                    name="birth_date"id="formGroupExampleInput" />
                                @if ($errors->has('birth_date'))
                                    <span class="errormsg">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group pt-1">
                                <small for="formGroupExampleInput">No.Telepon<span class="required">*</span></small>
                                <input type="text" class="form-control" value="{{ $us->phone }}" name="phone"
                                    id="formGroupExampleInput" />
                                @if ($errors->has('phone'))
                                    <span class="errormsg">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group pt-1">
                                <small for="formGroupExampleInput">Alamat<span class="required">*</span></small>
                                <input type="text" class="form-control" value="{{ $us->address }}"
                                    name="address"id="formGroupExampleInput" />
                                @if ($errors->has('address'))
                                    <span class="errormsg">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group pt-1">
                                <small for="" class="form-small">Jenis Kelamin</small></small>
                                <select name="gender" id="" class="form-select"
                                    class="form-control value=  @error('gender', 'post') is-invalid @enderror">
                                    <option>Jenis Kelamin</option>
                                    <option value="laki-laki" @if ($us->gender == 'laki-laki') selected @endif>Laki-laki
                                    </option>
                                    <option value="perempuan" @if ($us->gender == 'perempuan') selected @endif>Perempuan
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex my-3">
                                <button type="submit" class="btn-simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2">
                </div>
                <div class="col-5">
                    <h3 class="caption2"> Ubah Password</h3>
                    <!-- Alert message (start) -->
                    @if (Session::has('message2'))
                        <div class="alert {{ Session::get('alert-class') }}">
                            {{ Session::get('message2') }}
                        </div>
                    @endif
                    <!-- Alert message (end) -->
                    <form action="{{ route('updatePasswordProses', [$us->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div>
                            <div class="form-group">
                                <small for="formGroupExampleInput">Password Baru<span class="required">*</span></small>
                                <input type="password" name="password" class="form-control"
                                    id="formGroupExampleInput" />
                                @if ($errors->has('password'))
                                    <span class="errormsg">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group pt-2">
                                <small for="formGroupExampleInput">Re-Entry Password<span
                                        class="required">*</span></small>
                                <input type="password" name="repassword" class="form-control"
                                    id="formGroupExampleInput" />
                                @if ($errors->has('repassword'))
                                    <span class="errormsg">{{ $errors->first('repassword') }}</span>
                                @endif
                            </div>
                            <div class="d-flex my-3">
                                <button type="submit" class="btn-simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
        @endforeach
    </div>
    </div>
    </div>
@endsection
