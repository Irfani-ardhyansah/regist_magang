@extends('layouts.admin.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Mahasiswa Magang</h1>
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
                        <td> <button class="btn btn-link btn-sm">Jawaban.rar</button> </td>
                        <td> <a href="{{ url('/admin/detail/'. $row->id)}}" class="btn btn-primary btn-xs">Detail</a> <button class="btn btn-danger btn-xs">Delete</button> </td>
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