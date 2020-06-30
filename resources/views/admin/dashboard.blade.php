@extends('layouts.admin.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Mahasiswa Magang</h1>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {!! session('success') !!}
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {!! session('error') !!}
                </div>
                @endif
            </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                <thead>                  
                    <tr>
                    <th style="width: 10px">No</th>
                    <th>Univeristas</th>
                    <th>Nama Ketua</th>
                    <th>Group</th>
                    <th>Jumlah Anggota</th>
                    <th>Berkas Jawaban</th>
                    <th>Aksi</th>
                    </tr>
                </thead>
                @foreach($data as $row)
                <tbody>
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td> {{$row->universitas}} </td>
                        <td> {{$row->nama_ketua}} </td>
                        <td> {{$row->kelompok}} </td>
                        <td> {{$row->jumlah_anggota}} </td>
                        <td> <a href="/data_jawaban/{{$row->user->soal['item']}}" class="btn btn-link btn-sm">{{$row->user->soal['item']}}</a> </td>
                        <td>
                            <form action="{{ url('/admin/delete/' . $row->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" class="form-control"> 
                                <a href="{{ url('/admin/detail/'. $row->id)}}" class="btn btn-primary btn-xs">Detail</a> <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
                </table>
            </div>
            <!-- /.card-body -->
            </div>
        <!-- /.card-body -->
        <div class="card-footer">
        
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
@endsection