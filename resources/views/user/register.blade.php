@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleRegist.css')}}" rel="stylesheet" />
<div id="home" style="position: relative; height: auto;">
    <div class="landing-text">
      <div class="card" style=" width: 50rem; height: 45rem; position: relative; border:none;">
        <div class="card-body ">
          <h1>Form Registrasi</h1>
          <form>
            <div class="row">
              <div class="col-md-10">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Nama Ketua </label>
                  <input type="text" class="form-control" name="name" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Email Ketua </label>
                  <input type="text" class="form-control" name="email" required>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Password </label>
                  <input type="text" class="form-control" name="password" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Universitas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
              </div>
            </div>
            <div class="row">   
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Fakultas</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Prodi</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
              </div>
              <div class="col-md-10">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Alamat Univ</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none;" required></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Kelompok </label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option> - </option>
                    <option>Kelompok 1</option>
                    <option>Kelompok 2</option>
                    <option>Kelompok 3</option>
                    <option>Kelompok 4</option>
                    <option>Kelompok 5</option>
                  </select>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Jumlah Anggota</label>
                  <input type="number" class="form-control" placeholder="4" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Periode Mulai</label>
                  <input type="date" class="form-control" required>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Periode Akhir</label>
                  <input type="date" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
      </div>

      <button href="#" class="addanggota btn btn-success" style="margin-left: 70%; margin-top: 3%;">Tambah Anggota</button>

      <div class="anggota">

      </div>
      
      <button type="submit" class="btn btn-primary" style="width: 200px; margin-top: 2%;margin-left: 40%; margin-bottom: 5%;">Submit</button>
    </form>
    </div>
  </div>
@endsection