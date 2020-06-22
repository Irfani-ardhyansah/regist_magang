@extends('layouts.admin.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Soal</h1>
            </div>
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
    </div><!-- /.container-fluid -->
    </section>

<section class="content">

    <!-- Default box -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <a href={{ url('/admin/upload_file')}} class="btn btn-primary btn-sm float-right mb-3">Tambah</a>
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">No</th>
                    <th>Nama File</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($soal as $row)
                  <tr>
                    <td> {{$loop->iteration}} </td>
                    <td> {{$row->soal}} </td>
                    <td>
                      <form action="{{ url('/home/delete/' . $row -> id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                      <button class="btn btn-success btn-sm">Edit</button> <a href="/data_soal/{{$row->soal}}" style="margin-left: 2%; margin-right: 2%;" class="btn btn-primary btn-sm">Ungguh</a> <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
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