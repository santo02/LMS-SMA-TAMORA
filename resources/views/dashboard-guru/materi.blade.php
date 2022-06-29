@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/materidetail.css') }}">
@endsection
@section('content')
@foreach($module as $mod)
    <h1 class="title-course">Pengantar Sesi {{$mod->topic}}</h1>
    <div class="top-content">
        <h3 class="author">By :  {{$mod->name}}</h3>
        <li class="fas fa-cog set-item" data-bs-toggle="modal" data-bs-target="#exampleModal" style="font-size: 20px"></li>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Option</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            Edit
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <table class="table table-bordered" style="width: 50%">
            <tr>
                <th scope="col">Topik:</th>
                <td>{{$mod->topic}}</td>
            </tr>
            <tr>
                <th scope="col">Minggu ke-:</th>
                <td>{{$mod->week}}</td>
            </tr>
            <tr>
                <th scope="col">Sesi ke-:</th>
                <td>{{$mod->sesion}}</td>
            </tr>
        </table>
        <p>
            {{$mod->content}}
        </p>
        <h5>Nama File:</h5>
        <a href="#" class="file-link">{{$mod->file}}</a><br />
    </div>
    @endforeach
@endsection
