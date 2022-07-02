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
      <!-- Alert message (start) -->
     @if(Session::has('message'))
     <div class="alert {{ Session::get('alert-class') }}">
        {{ Session::get('message') }}
     </div>
     @endif
     <!-- Alert message (end) -->
      @foreach($users as $us)
      <form action="{{route('updateProfileProses',[$us->id])}}" method="post">
        {{csrf_field()}}
        <div>
          <div class="form-group">
            <label for="formGroupExampleInput">Nama Lengkap<span class="required">*</span></label>
            <input type="text" value="{{$us->name}}" name="name"class="form-control" id="formGroupExampleInput" />
            @if ($errors->has('name'))
               <span class="errormsg">{{ $errors->first('name') }}</span>
            @endif
          </div>
          @foreach ($role as $ro)
              @if($ro == 'teacher')
              <div class="form-group pt-1">
                  <label for="formGroupExampleInput">NIP<span class="required">*</span></label>
                  <input type="text" value="{{$us->nip}}" name="NIP" class="form-control" id="formGroupExampleInput" />
                </div>
              @elseif($ro == 'student')
              <div class="form-group pt-1">
                  <label for="formGroupExampleInput">NIS<span class="required">*</span></label>
                  <input type="text" value="{{$us->nis}}" name="NIS" class="form-control" id="formGroupExampleInput" />
                  @if ($errors->has('NIS'))
                    <span class="errormsg">{{ $errors->first('NIS') }}</span>
                  @endif
                </div>
              @endif
          @endforeach
          <div class="form-group pt-1">
            <label for="formGroupExampleInput">Email<span class="required">*</span></label>
            <input type="email" class="form-control" value="{{$us->email}}" name="email"id="formGroupExampleInput" />
            @if ($errors->has('email'))
               <span class="errormsg">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="form-group pt-1">
            <label for="formGroupExampleInput">No.Telepon<span class="required">*</span></label>
            <input type="text" class="form-control" value="{{$us->phone}}" name="phone" id="formGroupExampleInput" />
            @if ($errors->has('phone'))
               <span class="errormsg">{{ $errors->first('phone') }}</span>
            @endif
          </div>
          <div class="form-group pt-1">
            <label for="formGroupExampleInput">Alamat<span class="required">*</span></label>
            <input type="text" class="form-control" value="{{$us->address}}" name="address"id="formGroupExampleInput" />
            @if ($errors->has('address'))
               <span class="errormsg">{{ $errors->first('address') }}</span>
            @endif
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
      @if(Session::has('message2'))
      <div class="alert {{ Session::get('alert-class') }}">
          {{ Session::get('message2') }}
      </div>
      @endif
      <!-- Alert message (end) -->
      <form action="{{route('updatePasswordProses',[$us->id])}}" method="post">
        {{csrf_field()}}
        <div>
          <div class="form-group">
            <label for="formGroupExampleInput">Password Baru<span class="required">*</span></label>
            <input type="password" name="password" class="form-control" id="formGroupExampleInput" />
            @if ($errors->has('password'))
               <span class="errormsg">{{ $errors->first('password') }}</span>
            @endif
          </div>
          <div class="form-group pt-2">
            <label for="formGroupExampleInput">Re-Entry Password<span class="required">*</span></label>
            <input type="password" name="repassword" class="form-control" id="formGroupExampleInput" />
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
