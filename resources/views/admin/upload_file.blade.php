@extends('layouts.admin.app')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Tambah Soal</h1>
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
          <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-xs-6">
              <label for="">File </label>
                <input type="file" name="soal" class="form-control-file">
            </div>
            <div class="col-xs-6">
              <label for="">Nama File </label>
              <input type="text" class="form-control col-sm-5" name="name_file" required>
              <small>*File bertipe PDF</small>              
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Upload</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
<!-- /.card-body -->
  <div class="card-footer">
    
  </div>
  <!-- /.card-footer-->

</section>
@endsection