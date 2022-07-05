@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/addmateri.css') }}">
@endsection
@section('content')
    <h1 class="caption">Edit Tugas</h1>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <p class="m-2">
                {{ session('success') }}
            </p>
        </div>
    @endif
    @if (session()->has('gagal'))
        <div class="alert alert-danger" role="alert">
            <p class="m-2">
                {{ session('gagal') }}
            </p>
        </div>
    @endif
    <div class="box-content container">
        @foreach ($materi as $m)
            <form action="/proses-edit-tugas/{{$m->id}}" method="post" enctype="multipart/form-data" class="form-field">
                @csrf
                {{-- @foreach ($id_c as $id) --}}
                <input type="hidden" name="id_course" value="{{ $m->id_course }}">
                {{-- @endforeach --}}

                <div class="mb-3">
                    <label for="" class="form-label">Topik</label></label>
                    <input type="text" name="topik" value="{{ $m->topik }}" class="form-control  @error('topik', 'post') is-invalid @enderror">
                    @error('topik')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Bab</label></label>
                    <input type="text" name="bab"value="{{ $m->bab }}" class="form-control  @error('bab', 'post') is-invalid @enderror">
                    @error('bab')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Mulai</label></label>
                    <input type="datetime-local" name="T_mulai" value="{{ $m->T_mulai }}"
                        class="form-control  @error('T_mulai', 'post') is-invalid @enderror">
                    @error('T_mulai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Berakhir</label></label>
                    <input type="datetime-local" name="T_akhir" value="{{ $m->T_akhir }}"
                        class="form-control  @error('T_akhir', 'post') is-invalid @enderror">
                    @error('T_akhir')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">File</label></label>
                    <input type="file" name="file" value="{{ $m->file }}"class="form-control  @error('file', 'post') is-invalid @enderror">
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Lampiran lainnya </label></label>
                    <small>(Tidak wajib)</small>
                    <input type="text" name="lampiran" value="{{ $m->lampiran }}"
                        class="form-control  @error('lampiran', 'post') is-invalid @enderror">
                    @error('lampiran')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Deskripsi</label></label>
                    <Textarea name="deskripsi" value=""class="form-control  @error('deskripsi', 'post') is-invalid @enderror">{{ $m->Deskripsi}}</Textarea>
                    @error('deskripsi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn-add-custom">Simpan</button>
    </div>
    </form>
    @endforeach
    </div>
@endsection
