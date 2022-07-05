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
    @foreach ($materi as $m)
        <div class="sec bg-light p-4 rounded mb-4">
            <h1 class="title-course">Pengantar Sesi {{ $m->topik }}</h1>
            <div class="top-content">
                {{-- <h3 class="author">By : {{ $m->name }}</h3> --}}
            </div>

            <div class="main-content mb-4">
                <table class="table table-bordered" style="width: 70%">
                    <tr>
                        <th scope="col" style="width: 30%">Topik:</th>
                        <td>{{ $m->topik }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal mulai:</th>
                        <td>{{ $m->T_mulai }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal berakhir:</th>
                        <td>{{ $m->T_akhir }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Lampiran:</th>
                        <td>{{ $m->lampiran }}</td>
                    </tr>
                </table>

                @if ($m->lampiran)
                    <div class="video mt-3">
                        <iframe width="600" height="315" src="{{ $m->lampiran }}">
                        </iframe>
                    </div>
                @else
                    <p>-</p>
                @endif
                <p class="mt-2">
                    {{ $m->Deskripsi }}
                </p>
                <div class="file">
                    <h5 class="p-3">Nama File:</h5>
                    <a href="/download-materi/{{$m->id}}" class="file-link">{{ $m->file }}</a><br />
                </div>
                <h6 class="mt-4 " style="width: 100%">Oleh : {{ $m->name }}<small>({{ $m->nip }})</small></h6>

            </div>

        </div>
    @endforeach
@endsection
