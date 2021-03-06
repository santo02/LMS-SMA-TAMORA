@extends('sidebar.sidebar')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}">
@endsection
@section('content')
    <h1 class="title">Dashboard</h1>
    <div class="dashInfo">
        <div class="dashItem">
            <span class="dashTitle">Total Guru</span>
            <div class="dashCount">
                <h2 class="count text-center">  {{$jmlhGuru}} </h2>
            </div>
        </div>
        <div class="dashItem">
            <span class="dashTitle">Total Siswa</span>
            <div class="dashCount ">
                <h2 class="count text-center">{{$jmlhSiswa}}</h2>
            </div>
        </div>
    </div>
    @section('js')
    {{-- <script type="text/javascript">
             $(document).ready(function () {
            $(".sidebar-btn").click(function () {
                $(".wrapper").toggleClass("collapse");
            });
        });
</script> --}}
@endsection
@endsection
