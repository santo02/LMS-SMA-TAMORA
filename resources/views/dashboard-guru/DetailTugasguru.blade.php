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
    @foreach ($tugas as $t)
        <div class="sec bg-light p-4 rounded mb-4">
            <h1 class="title-course">Pengantar Sesi {{ $t->topik }}</h1>
            <div class="row">
                <div class="action col-auto mr-auto ">
                    <a href="/delete-tugas/{{ $t->id }}">
                        <i class="fas fa-trash set-item" style="font-size: 20px; color:red"></i>
                    </a>
                    <a href="/edit-tugas/{{ $t->id }}">
                        <i class="fa fa-edit set item" style="font-size: 20px;color:blue"></i>
                    </a>
                </div>
            </div>
            <div class="top-content">
                {{-- <h3 class="author">By : {{ $m->name }}</h3> --}}
            </div>

            <div class="main-content mb-4">
                <table class="table table-bordered" style="width: 70%">
                    <tr>
                        <th scope="col" style="width: 30%">Topik:</th>
                        <td>{{ $t->topik }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Tanggal mulai:</th>
                        <td>{{ $t->T_mulai }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Deadline:</th>
                        <td>{{ $t->T_akhir }}</td>
                    </tr>
                    <tr>
                        <th scope="col">Lampiran:</th>
                        <td>{{ $t->lampiran }}</td>
                    </tr>
                </table>

                @if ($t->lampiran)
                    <div class="video mt-3">
                        <iframe width="600" height="315" src="{{ $t->lampiran }}">
                        </iframe>
                    </div>
                @else
                    <p>-</p>
                @endif
                <p class="mt-2">
                    {{ $t->Deskripsi }}
                </p>
                <div class="file">
                    <h5 class="p-3">Nama File:</h5>
                    <a href="/download-tugas/{{ $t->id }}" class="file-link">{{ $t->file }}</a><br />
                </div>
                <table class="table table-bordered mt-5" style="width: 90%">
                    <tr>
                        <th scope="col" style="">NIS</th>
                        <th scope="col" style="">Nama</th>
                        <th scope="col" style="">file</th>
                        <th scope="col" style="">nilai</th>
                        <th scope="col" style="">aksi</th>
                    </tr>
                    @foreach ($subs as $sub)
                        <tr>
                            <td>{{ $sub->nis }}</td>
                            <td>{{ $sub->name }}</td>
                            <td><a href="/download-submissions/{{$sub->id}}">{{ $sub->file }}</a></td>
                            <form action="/nilai" method="POST">
                                @csrf
                                <td><input type="text" value="{{ $sub->nilai }}" name="nilai"></td>
                                <input type="hidden" value="{{ $sub->id }}" name="id_sub">
                                <td><button type="submit">Tambah Niali</button></td>
                            </form>

                        </tr>
                    @endforeach
                </table>

                <h6 class="mt-5" style="width: 100%">Oleh : {{ $t->name }}<small>({{ $t->nip }})</small></h6>

            </div>

        </div>
    @endforeach
@endsection
