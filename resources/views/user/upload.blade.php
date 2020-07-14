@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleData.css')}}" rel="stylesheet" />
<div class="padding" >
    <div class="container" style="margin-bottom: 5%; margin-top: 5%;">
      <div class="row" style="margin-left: 20%;">
        <div class="col-sm-10">
            <h1>Form Upload Jawaban</h1>
            <div class="card" style="border:none;">

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

              <!-- /.card-header -->
              <div class="card-body">
                    <form action="{{route('upload_jawaban')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group col-xs-6">
                        <label for="">File </label>
                          <input type="file" name="item" class="form-control-file">
                      </div>
                      <div class="col-xs-6">
                        <label for="">Nama File </label>
                        <input type="text" class="form-control col-sm-5" name="name_file" required>
                        <small>*File bertipe ZIP/RAR</small>              
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm"  style="width: 200px; margin-top: 2%;margin-left: 30%;margin-bottom: 10%;">Upload</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
      </div>
      </div>
@endsection