@extends('sidebar.sidebar')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/cs.css') }}">
@endsection
@section('content')
    <div class="heading text-center">
        <h2>PUSAT BANTUAN E - LEARNING</h2>
        <h2>Temukan jawaban Anda di sini</h2>
    </div>
    <h1>FAQ</h1>
    <div class="row">
        <div class="col-5 m-4">
            <h2>Guru</h2>
            <div class="tabs ">
                <div class="tab">
                    <input type="checkbox" id="chck1">
                    <label class="tab-label" for="chck1">Cara Upload Module/Tugas</label>
                    <div class="tab-content">
                        Pilih menu my course
                        >> klik card course yang module/tugasnya akan ditambah
                        >> klik button add pada tab module/tugas
                        >> lengkapi form
                        >> Tekan create

                    </div>
                </div>
                <div class="tab">
                    <input type="checkbox" id="chck2">
                    <label class="tab-label" for="chck2">Cara Membuat Course</label>
                    <div class="tab-content">
                        Pilih menu my course
                        >> klik button create
                        >> lengkapi form
                        >> klik submit
                    </div>
                </div>
                <div class="tab">
                    <input type="checkbox" id="chck6">
                    <label class="tab-label" for="chck6">Cara enroll siswa ke course</label>
                    <div class="tab-content">
                        pilih menu my course
                        >> klik card course
                        >> klik icon setting pada display enroll disebelah kanan
                        >> pilih enroll
                        >> lengkapi form
                        >> klik button create
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5 m-4">
            <h2>Siswa</h2>
            <div class="tabs">
                <div class="tab">
                    <input type="checkbox" id="chck3">
                    <label class="tab-label" for="chck3">Cara Selfenrollment</label>
                    <div class="tab-content">
                        Pilih menu Course
                        >> Klik card course yang akan dienroll
                        >> isi form berupa key enroll
                        >> klik button enroll
                    </div>
                </div>
                <div class="tab">
                    <input type="checkbox" id="chck4">
                    <label class="tab-label" for="chck4">Cara mengirim Tugas</label>
                    <div class="tab-content">
                        Pilih menu My Course
                        >> pilih course yang diinginkan
                        >> klik button add submission
                        >> pilih file yang ingin disubmit
                        >> Klik button submit
                    </div>
                </div>
                <div class="tab">
                    <input type="checkbox" id="chck5">
                    <label class="tab-label" for="chck5">Cara Melihat Materi</label>
                    <div class="tab-content">
                        pilih menu My Course
                        >> pilih card course yang diinginkan
                        >> pilih materi yang ingin dilihat pada tab materi
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center">Terms & condition</h2>
@endsection
