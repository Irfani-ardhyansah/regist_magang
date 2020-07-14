@extends('layouts.admin.app')

@section('content')

<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Data Detail Anggota</h1>
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
                    <td>Nama</td>
                    <td>:</td>
                    <td> {{$row->nama}} </td>
                  </tr>
                  <tr>
                      <td>NIM</td>
                      <td>:</td>
                      <td> {{$row->nim}} </td>
                    </tr>
                  <tr>
                      <td>Jenis Kelamin</td>
                      <td>:</td>
                      <td> {{$row->jenis_kelamin}} </td>
                  </tr>
                  <tr>
                      <td>No. Telp</td>
                      <td>:</td>
                      <td> {{$row->no_hp}} </td>
                  </tr>
                  <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td> {{$row->email_anggota}} </td>
                  </tr>
                  <tr>
                      <td>Sosmed</td>
                      <td>:</td>
                      <td> {{$row->sosmed}} </td>
                  </tr>
                  <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td> {{$row->alamat}} </td>
                  </tr>
                  <tr>
                      <td>Bidang Minat</td>
                      <td>:</td>
                      <td>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled {{in_array("Android Developer",$bidang_minat)?"checked":""}}>
                          <label class="form-check-label" for="inlineCheckbox3">Android Developer</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled {{in_array("Frontend",$bidang_minat)?"checked":""}}>
                          <label class="form-check-label" for="inlineCheckbox3">Frontend</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled {{in_array("Web Programing",$bidang_minat)?"checked":""}}>
                          <label class="form-check-label" for="inlineCheckbox3">Web Programing</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled {{in_array("Database",$bidang_minat)?"checked":""}}>
                          <label class="form-check-label" for="inlineCheckbox3">Database</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled {{in_array("UI / UX",$bidang_minat)?"checked":""}}>
                          <label class="form-check-label" for="inlineCheckbox3">UI / UX</label>
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <td>Keahlian</td>
                      <td>:</td>
                      <td>{{$row->keahlian}}</td>
                  </tr>
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