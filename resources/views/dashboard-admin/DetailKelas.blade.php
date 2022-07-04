@extends('sidebar.sidebar');
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@endsection
@section('content')
    <div class="col-md-10 container p-4 bg-light">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <p class="m-2">
                    {{ session('success') }}
                </p>
            </div>
        @endif
        <h1 class="title mt-4">Daftar siswa Kelas</h1>
        <hr>
        <label class=" pl-2 mb-4"><a href="{{ Route('kelas') }}">Kelas </a> / Detail kelas </label>
        <br>
        @foreach ($kelas as $kl)
            <input type="button" class="btn-add-custom mt-3 mb-4" value="add-siswa" data-bs-toggle="modal"
                data-bs-target="#tambah{{ $kl->id }}">
            <div class="modal fade" id="tambah{{ $kl->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                @csrf
                                <input type="hidden" name="id_kelass" value="{{ $kl->id }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">NIS</label>
                                    <input type="text" class="typeahead form-control" name="nis" id="nis"
                                        value="">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach --}}
                <tr>
                    </th>
                    <td></td>
                    <td></td>
                    
                    <td>
                        <li class="fas fa-trash-alt action-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            style="font-size: 20px; color: red"></li>
                    </td>
                </tr>
                <div class="modal fade" id="edit" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama kelas</label>
                                        <input class=" form-control" type="text" name="mapels" value="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama tahun ajaran</label>
                                        <input type="text" name="mapels" class="form-control" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tbody>
        </table>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/5.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var route = "{{ url('/auto-search') }}";
        $('#nis').typeahead({
            source: function(query, process) {
                return $.get(route, {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        });
    </script>
@endsection
