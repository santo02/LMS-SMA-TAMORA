@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/addmateri.css') }}">
@endsection
@section('content')
<h1 class="caption">Create Materi Fisika 6</h1>
<div class="box-content container">
  <form action="{{Route('add-materi-proses', $id)}}" method="post" enctype="multipart/form-data" class="form-field">
    @csrf
    <div class="form-group">
      <label for="formGroupExampleInput">Topik</label>
      <input type="text" name="topic" class="form-control" id="formGroupExampleInput" />
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput">content</label>
      <input type="text" name="content" class="form-control" id="formGroupExampleInput" />
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Minggu ke</label>
      <select class="form-select" name="week" aria-label="Default select example">
        <option>Minggu Ke-</option>
            @for ($i = 1; $i < 17; $i++)
             <option value="{{$i}}" >{{$i}}</option>
             {{-- @if($course->minggu == $i) selected @endif --}}
            @endfor
    </select>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Sesi ke</label>
      <select class="form-select" name="sesion" aria-label="Default select example">
        <option>Sesi Ke-</option>
            @for ($i = 1; $i < 6; $i++)
             <option value="{{$i}}" >{{$i}}</option>
             {{-- @if($course->minggu == $i) selected @endif --}}
            @endfor
    </select>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Tanggal sesi</label>
      <input type="date" name="sesison_date" class="form-control" id="formGroupExampleInput2" placeholder="masukkan sesi (number)" />
    </div>
    <div class="mb-3">
      <label for="formFileMultiple" class="form-label">File</label>
      <input class="form-control" name="file" type="file" id="formFileMultiple" multiple />
    </div>
    <div class="d-flex my-3">
      <a>
        <button class="btn-add-custom">Create</button>
      </a>
    </div>
  </form>
</div>
@endsection
