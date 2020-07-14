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
                  <tr class="d-flex">
                    <th class="col-1">No</th>
                    <th class="col-3">Nama File</th>
                    <th class="col-4">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($soal as $row)
                  <tr  class="d-flex">
                    <td class="col-1"> {{$loop->iteration}} </td>
                    <td class="col-3"> {{$row->item}} </td>
                    <td class="col-4">
                      <form action="{{ url('/admin/upload/' . $row -> id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                        <a href="/data_soal/{{$row->item}}" style="margin-left: 2%; margin-right: 2%;" class="btn btn-primary btn-sm">Unduh</a> <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
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