@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleData.css')}}" rel="stylesheet" />
<div class="padding" style="margin-bottom: 5%; margin-top: 5%;">
    <div class="container">
      <div class="row" style="margin-left: 20%;">
        <div class="col-sm-10">
          <table class="table table-borderless">
  
            <tbody>
              <h1 style="margin-bottom: 5%;">Data Detail Mahasiswa</h1>
              <tr>
                <th>Nama</th>
                <td> : </td>
                <td>{{$data->nama}}</td>
              </tr>
              <tr>
                <th>NIM</th>
                <td> : </td>
                <td>{{$data->nim}}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td> : </td>
                <td>{{$data->jenis_kelamin}}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td> : </td>
                <td>{{$data->email_anggota}}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td> : </td>
                <td>{{$data->alamat}}</td>
              </tr>
              <tr>
                <th>Bidang Minat</th>
                <td> : </td>
                <td> {{$data->bidang_minat}} </td>
              </tr>
  
              <tr>
                <th>Keahlian </th>
                <td> : </td>
                <td>{{$data->keahlian}}</td>
              </tr>

              <tr>
                <th>Status </th>
                <td> : </td>
                <td>
                  @if($data->status == 0)<span class="badge badge-secondary">Menunggu</span>
                  @elseif($data->status == 1)<span class="badge badge-success">Diterima</span>
                  @elseif($data->status == 2)<span class="badge badge-danger">Ditolak</span>
                  @elseif($data->status == 3)<span class="badge badge-light">Selesai</span>@endif
                </td>
              </tr>
            </tbody>
          </table>
          <a href="{{ url('/home') }}" class="btn btn-light" style="width: 200px; margin-top: 5%;margin-left: 55%;margin-bottom: 10%;">Back</a>
        </div>
      </div>
    </div>
  </div>
  
@endsection