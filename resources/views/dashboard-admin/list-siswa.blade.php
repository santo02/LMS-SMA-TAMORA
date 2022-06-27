
@extends('sidebar.sidebar');
@section('content')
    <div class="List p-3">
        <h3>Daftar Akun Siswa</h3>
        <div class="d-flex my-3">
          <a href="{{Route('addSiswa')}}" class="ms-auto">
            <button class="btn-add-custom ">+Add New</button>
          </a>
        </div>
    <table id="example" class="table table-striped" style="width: 100%">
      <thead>
        <tr>
          <th>Nama</th>
          <th>NISN</th>
          <th>Email</th>
          <th>No.Telepon</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Tiger Nixon</td>
          <td>11419078</td>
          <td>tiger@gmail.com</td>
          <td>081234567890</td>
          <td>Jl. Sisingamangaraja, Porsea</td>
          <td onclick=""><i class='fas fa-trash-alt' style='font-size:20px;color:red'></i></td>
        </tr>
        <tr>
          <td>Garrett Winters</td>
          <td>Accountant</td>
          <td>Tokyo</td>
          <td>63</td>
          <td>2011-07-25</td>
          <td>$170,750</td>
        </tr>
        <tr>
          <td>Ashton Cox</td>
          <td>Junior Technical Author</td>
          <td>San Francisco</td>
          <td>66</td>
          <td>2009-01-12</td>
          <td>$86,000</td>
        </tr>
        <tr>
          <td>Cedric Kelly</td>
          <td>Senior Javascript Developer</td>
          <td>Edinburgh</td>
          <td>22</td>
          <td>2012-03-29</td>
          <td>$433,060</td>
        </tr>
        <tr>
          <td>Airi Satou</td>
          <td>Accountant</td>
          <td>Tokyo</td>
          <td>33</td>
          <td>2008-11-28</td>
          <td>$162,700</td>
        </tr>
        <tr>
          <td>Brielle Williamson</td>
          <td>Integration Specialist</td>
          <td>New York</td>
          <td>61</td>
          <td>2012-12-02</td>
          <td>$372,000</td>
        </tr>
        <tr>
          <td>Herrod Chandler</td>
          <td>Sales Assistant</td>
          <td>San Francisco</td>
          <td>59</td>
          <td>2012-08-06</td>
          <td>$137,500</td>
        </tr>
        <tr>
          <td>Rhona Davidson</td>
          <td>Integration Specialist</td>
          <td>Tokyo</td>
          <td>55</td>
          <td>2010-10-14</td>
          <td>$327,900</td>
        </tr>
        <tr>
          <td>Colleen Hurst</td>
          <td>1142623</td>
          <td>collen@gmail.com</td>
          <td>08227348221</td>
          <td>Jl. Batang kuis no.7</td>
          <td onclick=""><i class='fas fa-trash-alt' style='font-size:20px;color:red'></i></td>
        </tr>
        </tr>
      </tbody>
      <tfoot>
        <th>Nama</th>
        <th>NISN</th>
        <th>Email</th>
        <th>No.Telepon</th>
        <th>Alamat</th>
        <th>Action</th>
    </tfoot>
@endsection