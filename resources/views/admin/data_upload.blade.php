@extends('layouts.admin.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 style="font-family:verdana;"> <b style="color: #343A40;">Data Soal</b> </h1>
            </div>
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
    </div><!-- /.container-fluid -->
    </section>

<section class="content">

    <!-- Default box -->
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <a href={{ url('/admin/upload_file')}} class="btn btn-success btn-sm float-right mb-3">Tambah</a>
              <table class="table table-bordered">
                <thead class="thead-light">                  
                  <tr>
                    <th scope="col" >No</th>
                    <th scope="col" >Nama File</th>
                    <th scope="col" >Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($soal as $row)
                  <tr>
                    <td scope="col" > {{$loop->iteration}}. </td>
                    <td scope="col" > {{$row->item}} </td>
                    <td scope="col" class="text-center" >
                      <form action="{{ url('/admin/upload/' . $row -> id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE" class="form-control">
                        <a href="/data_soal/{{$row->item}}" style="margin-left: 2%; margin-right: 2%;" class="btn btn-primary btn-sm">Unduh</a> <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                      <td class="text-center" colspan="6"><h6 style="font-family:monaco;"> <b style="color: #343A40;">Tidak Ada Data</b> </h6></td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      <!-- /.card-body -->
      {{-- <div class="card-footer">
        
      </div> --}}
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
@endsection