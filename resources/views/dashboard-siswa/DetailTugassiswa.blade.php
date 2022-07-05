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
            </h6>
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
                    <tr>
                        <th scope="col">Pengajar:</th>
                        <td>{{ $t->name }} - ({{ $t->nip }})</td>
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
                </table>

                <div class="main-content m-4">
                    <table class="table table-bordered" style="width: 70%">
                        <tr>
                            <th scope="col">Deadline:</th>
                            <td>{{ $t->T_mulai }} - {{ $t->T_akhir }}</td>
                        </tr>
                        <tr>
                            <th scope="col">file:</th>
                            @foreach ($mysub as $ms)
                                @foreach ($for_id as $fid)
                                    <td><a href="/download-submissions/{{ $fid->id }}">{{ $ms->file }}</a></td>
                                @endforeach
                            @endforeach
                        </tr>
                        <tr>
                            <th scope="col">Nilai:</th>
                            @foreach ($for_id as $fid)
                                <td>{{ $fid->nilai }}</td>
                            @endforeach
                        </tr>
                    </table>

                    @if ($t->T_akhir > Carbon\Carbon::now())
                        @if (count($for_id) == 0)
                            <button type="submit" class="btn btn-warning btn-sm" data-bs-target="#submit"
                                data-bs-toggle="modal">Add Submission</button>
                        @endif
                        @foreach ($for_id as $fid)
                            <a href="/delete-subs/{{ $fid->id }}"><button type="submit"
                                    class="btn btn-danger btn-sm">Delete Submission</button></a>
                        @endforeach
                    @else
                        <button type="submit" class="btn btn-success btn-sm" disabled>Add Submission</button>
                    @endif
                </div>
                <div class="modal" id="submit">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add submission</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/add-submission" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($sub_id as $su_id)
                                        <input type="hidden" name="id_s" value="{{ $su_id->id }}">
                                    @endforeach
                                    <input type="file" name="file" id="" class="form-control">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">submit</button>
                                        <button type="reset" data-bs-dismiss="modal" class="btn btn-danger">Batal</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                {{-- {{$mysub[0]->id}} --}}
            </div>
    @endforeach
@endsection
