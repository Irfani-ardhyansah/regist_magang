@extends('layouts.admin.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Detail Kelompok</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>
    
<section class="content">
    <!-- Default box -->
  <div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-borderless" style="margin-left: 10%;">
        <thead>                  
          <tr>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Universitas</td>
            <td>:</td>
            <td> {{$row->universitas}} </td>
          </tr>
          <tr>
              <td>Fakultas</td>
              <td>:</td>
              <td> {{$row->fakultas}} </td>
            </tr>
          <tr>
              <td>Prodi</td>
              <td>:</td>
              <td> {{$row->prodi}} </td>
          </tr>
          <tr>
              <td>Alamat Universitas</td>
              <td>:</td>
              <td> {{$row->alamat_univ}} </td>
          </tr>
          <tr>
              <td>Jumlah Anggota</td>
              <td>:</td>
              <td> {{$row->jumlah_anggota}} </td>
          </tr>
          <tr>
              <td>Kelompok</td>
              <td>:</td>
              <td> {{$row->kelompok}} </td>
          </tr>
          <tr>
              <td>Periode Mulai Magang</td>
              <td>:</td>
              <td> {{$row->periode_mulai}} </td>
          </tr>
          <tr>
              <td>Periode Akhir Magang</td>
              <td>:</td>
              <td> {{$row->periode_akhir}} </td>
          </tr>
          <tr>
              <td>Nama Ketua Kelompok</td>
              <td>:</td>
              <td> {{$row->nama_ketua}} </td>
          </tr>
          <tr>
              <td>Email</td>
              <td>:</td>
              <td> {{$row->user->email}} </td>
          </tr>
          <tr>
              <td>Berkas Jawaban</td>
              <td>:</td>
              <td> 
                @if($row->user->soal['item'] == true)
                  <a href="/data_jawaban/{{$row->user->soal['item']}}">{{$row->user->soal['item']}}</a>
                @else
                  <span class="badge badge-warning">Belum Upload Jawaban</span>
                @endif
              </td>
          </tr>
        </tbody>
      </table>

      <div class="card-body">

        <table class="table table-bordered">
          <thead>
            <th style="width: 10px">No</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Aksi</th>
          </thead>
          @foreach($data_kelompok as $rows)
              <tbody>
              <tr>
                  <td> {{$loop->iteration}} </td>
                  <td> {{$rows->nama}} </td>
                  <td>
                    @if($rows->status == 0)<span class="badge badge-secondary">Menunggu</span>
                    @elseif($rows->status == 1)<span class="badge badge-success">Diterima</span>
                    @elseif($rows->status == 2)<span class="badge badge-danger">Ditolak</span>
                    @elseif($rows->status == 3)<span class="badge badge-light">Selesai</span>@endif
                  </td>
                  <td>
                    <form action="{{ url('/admin/detail/delete/' . $rows -> id) }}" method="POST">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE" class="form-control">
                      <a href="{{ url('/admin/detail_anggota/'. $rows->id)}}" class="btn btn-primary btn-xs">Detail</a> <span class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-status-{{ $rows->id }}">Ubah Status</span> <button class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
                    </form>
                  </td>
              </tr>
              </tbody>
          @endforeach
        </table>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
  </div>
  <!-- /.card-footer-->
</section>

<!-- Modal -->
@foreach($data_kelompok as $rows)
<div class="modal fade" id="modal-status-{{ $rows->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Status Magang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/detail/'. $rows->id .'/change_status' ) }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-2">
              <label> Status </label>
            </div>
            <div class="col-md-6">
              <select class="form-control" name="status">
                <option {{ $rows->status == '0' ? 'selected':'' }} value="0">Menunggu</option>
                <option {{ $rows->status == '1' ? 'selected':'' }} value="1">Diterima</option>
                <option {{ $rows->status == '2' ? 'selected':'' }} value="2">Ditolak</option>
                <option {{ $rows->status == '3' ? 'selected':'' }} value="3">Selesai</option>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm">Save changes</button>
      </div>
    </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endforeach

@endsection