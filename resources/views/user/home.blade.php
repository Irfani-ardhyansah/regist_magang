@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleData.css')}}" rel="stylesheet" />
<div class="padding">
    <div class="container" style="margin-bottom: 5%; margin-top: 5%;">
      <div class="row" style="margin-left: 20%;">
        <div class="col-sm-10">
          <table class="table table-borderless">
  
            <tbody>
              <h1 style="margin-bottom: 5%;">Data Kelompok Magang</h1>
              @foreach($data as $row)
              <tr>
                <th>Universitas</th>
                <td> : </td>
                <td>{{$row->universitas}}</td>
              </tr>
              <tr>
                <th>Fakultas</th>
                <td> : </td>
                <td>{{$row->fakultas}}</td>
              </tr>
              <tr>
                <th>Prodi</th>
                <td> : </td>
                <td>{{$row->prodi}}</td>
              </tr>
              <tr>
                <th>Alamat Universitas</th>
                <td> : </td>
                <td>{{$row->alamat_univ}}</td>
              </tr>
              <tr>
                <th>Jumlah Anggota</th>
                <td> : </td>
                <td>{{$row->jumlah_anggota}}</td>
              </tr>
              <tr>
                <th>Kelompok</th>
                <td> : </td>
                <td>{{$row->kelompok}}</td>
              </tr>
  
              <tr>
                <th>Periode Mulai Magang
                <td> : </td>
                <td>{{$row->periode_mulai}}</td>
              </tr>
              <tr>
                <th>Periode Akhir Magang</th>
                <td> : </td>
                <td>{{$row->periode_akhir}}</td>
              </tr>
              <tr>
                <th>Nama Ketua Kelompok</th>
                <td> : </td>
                <td>{{$row->nama_ketua}}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td> : </td>
                <td>{{$row->user->email}}</td>
              </tr>
              <tr>
                <th>Berkas Jawaban</th>
                <td> : </td>
                <td>
                  @if($row->user->soal['item'] == true)
                    <a href="/data_jawaban/{{$row->user->soal['item']}}">{{$row->user->soal['item']}}</a>
                  @else
                    <span class="badge badge-light">Belum Upload Jawaban</span>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
          <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#data_editModal-{{ $row->id }}" style="width: 200px; margin-top: 5%;margin-left: 52%;margin-bottom: 10%;">Edit</button>
          @endforeach
        </div>
      </div>
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Anggota</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach($data_kelompok as $rows)
          <tr>
            <th scope="row">{{$loop->iteration}}.</th>
            <td>{{$rows->nama}}</td>
            <td>
              @if($rows->status == 0)<span class="badge badge-secondary">Menunggu</span>
              @elseif($rows->status == 1)<span class="badge badge-success">Diterima</span>
              @elseif($rows->status == 2)<span class="badge badge-danger">Ditolak</span>
              @elseif($rows->status == 3)<span class="badge badge-light">Selesai</span>@endif
            </td>
            <td>
              <form action="{{ url('/home/delete/' . $rows -> id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE" class="form-control"> 
                <a href="{{url('/detail/'.$rows->id)}}" class="btn btn-primary btn-sm">Detail</a>  <span class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal-{{ $rows->id }}">Edit</span>  <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal Edit Anggota-->
@foreach($data_kelompok as $rows)
<div class="modal fade" id="editModal-{{ $rows->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/home/edit/'. $rows->id ) }}" method="POST">
          @csrf
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" value="{{$rows->nama}}" required>
            </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nim" value="{{$rows->nim}}" required>
            </div>
          </div>
          <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                <select class="form-control" name="jenis_kelamin">
                  <option {{ $rows->jenis_kelamin == 'Laki-laki' ? 'selected':'' }} value="Laki-laki">Laki-laki</option>
                  <option {{ $rows->jenis_kelamin == 'Perempuan' ? 'selected':'' }} value="Perempuan">Perempuan</option>
                </select>
              </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email_anggota" value="{{$rows->email_anggota}}" required>
              </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" value="{{$rows->alamat}}" required>
            </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Bidang Minat</label>
            @php($array = array($rows->bidang_minat))
            @php($hasil = implode(",",$array))
            @php($bidang = explode(",",$hasil))
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="bidang_minat[]" value="Android Developer" {{in_array("Android Developer",$bidang)?"checked":""}}>
                <label class="form-check-label" for="inlineCheckbox3">Android Developer</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="bidang_minat[]" value="Frontend" {{in_array("Frontend",$bidang)?"checked":""}}>
                <label class="form-check-label" for="inlineCheckbox3">Frontend</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="bidang_minat[]" value="Web Programing" {{in_array("Web Programing",$bidang)?"checked":""}}>
                <label class="form-check-label" for="inlineCheckbox3">Web Programing</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="bidang_minat[]" value="Database" {{in_array("Database",$bidang)?"checked":""}}>
                <label class="form-check-label" for="inlineCheckbox3">Database</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="bidang_minat[]" value="UI / UX" {{in_array("UI / UX",$bidang)?"checked":""}}>
                <label class="form-check-label" for="inlineCheckbox3">UI / UX</label>
              </div>
            </div>
          </div>
          <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Keahlian</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="keahlian" value="{{$rows->keahlian}}" required>
              </div>
            </div>
      </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal Edit Kelompok -->
@foreach($data as $row)
<div class="modal fade" id="data_editModal-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/home/update/'. $row->id ) }}" method="POST">
          @csrf
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Universitas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="universitas" value="{{$row->universitas}}" required>
            </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Fakultas</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fakultas" value="{{$row->fakultas}}" required>
            </div>
          </div>
          <div class="form-group row mt-3">
            <label class="col-sm-2 col-form-label">Prodi</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="prodi" value="{{$row->prodi}}" required>
              </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Alamat Univ</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat_univ" value="{{$row->alamat_univ}}" required>
              </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Jumlah Anggota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="jumlah_anggota" value="{{$row->jumlah_anggota}}" required>
            </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Kelompok</label>
            <div class="col-sm-10">
              <select class="form-control" name="kelompok">
                <option {{ $rows->kelompok == 'Kelompok 1' ? 'selected':'' }} value="Kelompok 1">Kelompok 1</option>
                <option {{ $rows->kelompok == 'Kelompok 2' ? 'selected':'' }} value="Kelompok 2">Kelompok 2</option>
                <option {{ $rows->kelompok == 'Kelompok 3' ? 'selected':'' }} value="Kelompok 3">Kelompok 3</option>
                <option {{ $rows->kelompok == 'Kelompok 4' ? 'selected':'' }} value="Kelompok 4">Kelompok 4</option>
              </select>
            </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Periode Mulai</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="periode_mulai" value="{{$row->periode_mulai}}" required>
            </div>
          </div>
          <div class="form-group row mt-3">
          <label class="col-sm-2 col-form-label">Periode Akhir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="periode_akhir" value="{{$row->periode_akhir}}" required>
            </div>
          </div>
            <div class="form-group row mt-3">
              <label class="col-sm-2 col-form-label">Nama Ketua</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_ketua" value="{{$row->nama_ketua}}" required>
                </div>
              </div>
      </div>
          <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
  </div>
</div>
@endforeach

@endsection