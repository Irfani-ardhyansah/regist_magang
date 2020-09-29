@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleRegist.css')}}" rel="stylesheet" />
<div id="home" class="container" style="position: relative; height: auto;">
    <div class="landing-text" style="height:auto;">
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card" style=" margin-top:7%; width: 50rem; height: auto; position: relative; border:none;">
            <div class="card-body ">
            <h1>Form Registrasi</h1>
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
            
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                        <label for="exampleInputEmail1"> Nama Ketua </label>
                        <input type="text" class="form-control @error('nama_ketua') is-invalid:'' @enderror" name="nama_ketua" value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                        <label for="exampleInputEmail1"> Email Ketua </label>
                        <input type="email" class="form-control @error('email') is-invalid:'' @enderror" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                        <label for="exampleInputEmail1"> Password </label>
                        <input type="password" class="form-control @error('password') is-invalid:'' @enderror" name="password" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                        <label for="exampleInputEmail1"> Password Confirm </label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-8">
                        <div class="form-group">
                        <label> Universitas</label>
                        <input type="text" class="form-control @error('universitas') is-invalid:'' @enderror" name="universitas" value="{{ old('universitas') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                            <label> Fakultas</label>
                            <input type="text" class="form-control @error('fakultas') is-invalid:'' @enderror" name="fakultas" value="{{ old('fakultas') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                            <label> Prodi</label>
                            <input type="text" class="form-control @error('prodi') is-invalid:'' @enderror" name="prodi" value="{{ old('prodi') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-8">
                        <div class="form-group">
                            <label> Alamat Univ</label>
                            <textarea class="form-control @error('alamat_univ') is-invalid:'' @enderror" name="alamat_univ" value="{{ old('alamat_univ') }}" rows="3" style="resize: none;" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                            <label> Kelompok </label>
                            <select class="form-control @error('kelompok') is-invalid:'' @enderror" name="kelompok" required>
                                <option> - </option>
                                <option value="Kelompok 1">Kelompok 1</option>
                                <option value="Kelompok 2">Kelompok 2</option>
                                <option value="Kelompok 3">Kelompok 3</option>
                                <option value="Kelompok 4">Kelompok 4</option>
                                <option value="Kelompok 5">Kelompok 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                            <label> Jumlah Anggota</label>
                            <input type="number" class="form-control @error('jumlah_anggota') is-invalid:'' @enderror" name="jumlah_anggota" value="{{ old('jumlah_anggota') }}" placeholder="4" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                            <label> Periode Mulai</label>
                            <input type="date" class="form-control @error('periode_mulai') is-invalid:'' @enderror" name="periode_mulai" value="{{ old('periode_mulai') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-4">
                        <div class="form-group">
                            <label> Periode Akhir</label>
                            <input type="date" class="form-control @error('periode_akhir') is-invalid:'' @enderror" name="periode_akhir" value="{{ old('periode_akhir') }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span class="addanggota btn btn-success" style="margin-left: 65%; margin-top: 3%;">Tambah Anggota</span>

        <div class="anggota" style="height:auto">
        </div>

        <button type="submit" class="btn btn-primary" style="width: 200px; margin-top: 2%; margin-left: 40%; margin-bottom: 5%;">Submit</button>
        </form>
    </div>
</div>
@endsection
