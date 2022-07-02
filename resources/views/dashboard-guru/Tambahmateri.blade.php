@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/addmateri.css') }}">
@endsection
@section('content')
    <h1 class="caption">Create Materi</h1>
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
        <form action="{{ Route('add-materi-proses', $id) }}" method="post" enctype="multipart/form-data" class="form-field">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Topik</label>
                <input type="text" name="topic" class="form-control" id="formGroupExampleInput" />
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">content</label>
                <input type="text" name="content" class="form-control" id="formGroupExampleInput" />
            </div>

            <input type="hidden" name="week" class="form-control" value="{{ $week }}"
                id="formGroupExampleInput" />


            <div class="form-group">
                <label for="formGroupExampleInput2">Sesi ke</label>
                <select class="form-select" name="sesion" aria-label="Default select example">
                    <option>Sesi Ke-</option>
                    @for ($i = 1; $i < 6; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        {{-- @if ($course->minggu == $i) selected @endif --}}
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Tanggal sesi</label>
                <input type="date" name="sesison_date" class="form-control" id="formGroupExampleInput2"
                    placeholder="masukkan sesi (number)" />
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
