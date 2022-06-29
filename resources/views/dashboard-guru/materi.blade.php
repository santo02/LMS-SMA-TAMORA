@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/materidetail.css') }}">
@endsection
@section('content')
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    <p class="m-2">
        {{ session('success') }}
    </p>
</div>
@endif
    @foreach ($module as $mod)
    <div class="sec bg-light p-4 rounded">
        <h1 class="title-course">Pengantar Sesi {{ $mod->topic }}</h1>
        <div class="row">
            <div class="action col-auto mr-auto ">
                <a href="/delete-materi/{{$mod->module_id}}">
                    <i class="fas fa-trash set-item" style="font-size: 20px; color:red"></i>
                </a>
                <a href="#">
                    <i class="fa fa-edit set item" style="font-size: 20px;color:blue"></i>
                </a>
            </div>
        </div>
        <div class="top-content">
            <h3 class="author">By : {{ $mod->name }}</h3>
        </div>

        <div class="main-content">
            <table class="table table-bordered" style="width: 50%">
                <tr>
                    <th scope="col">Topik:</th>
                    <td>{{ $mod->topic }}</td>
                </tr>
                <tr>
                    <th scope="col">Minggu ke-:</th>
                    <td>{{ $mod->week }}</td>
                </tr>
                <tr>
                    <th scope="col">Sesi ke-:</th>
                    <td>{{ $mod->sesion }}</td>
                </tr>
            </table>
            <p>
                {{ $mod->content }}
            </p>
            <h5>Nama File:</h5>
            <a href="#" class="file-link">{{ $mod->file }}</a><br />
        </div>
    </div>

    @endforeach

@endsection
