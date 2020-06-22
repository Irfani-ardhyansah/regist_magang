{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleRegist.css')}}" rel="stylesheet" />
<div id="home" style="position: relative; height: auto;">
    <div class="landing-text">
        <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card" style=" width: 50rem; height: 45rem; position: relative; border:none;">
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
                <div class="col-md-5">
                    <div class="form-group">
                    <label for="exampleInputEmail1"> Nama Ketua </label>
                    <input type="text" class="form-control" name="nama_ketua" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                    <label for="exampleInputEmail1"> Email Ketua </label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                    <label for="exampleInputEmail1"> Password </label>
                    <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                    <label for="exampleInputEmail1"> Password Confirm </label>
                    <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                    <label> Universitas</label>
                    <input type="text" class="form-control" name="universitas" value="{{ old('universitas') }}">
                    </div>
                </div>
                </div>
                <div class="row">   
                <div class="col-md-5">
                    <div class="form-group">
                        <label> Fakultas</label>
                        <input type="text" class="form-control" name="fakultas" value="{{ old('fakultas') }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label> Prodi</label>
                        <input type="text" class="form-control" name="prodi" value="{{ old('prodi') }}">
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label> Alamat Univ</label>
                        <textarea class="form-control" name="alamat_univ" value="{{ old('alamat_univ') }}" rows="3" style="resize: none;"></textarea>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label> Kelompok </label>
                        <select class="form-control" name="kelompok">
                            <option> - </option>
                            <option value="Kelompok 1">Kelompok 1</option>
                            <option value="Kelompok 2">Kelompok 2</option>
                            <option value="Kelompok 3">Kelompok 3</option>
                            <option value="Kelompok 4">Kelompok 4</option>
                            <option value="Kelompok 5">Kelompok 5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label> Jumlah Anggota</label>
                        <input type="number" class="form-control" name="jumlah_anggota" value="{{ old('jumlah_anggota') }}" placeholder="4">
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label> Periode Mulai</label>
                        <input type="date" class="form-control" name="periode_mulai" value="{{ old('periode_mulai') }}">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label> Periode Akhir</label>
                        <input type="date" class="form-control" name="periode_akhir" value="{{ old('periode_akhir') }}">
                    </div>
                </div>
                </div>
            </div>
        </div>

        <span class="addanggota btn btn-success" style="margin-left: 70%; margin-top: 3%;">Tambah Anggota</span>

        <div class="anggota">

        </div>

        <button type="submit" class="btn btn-primary" style="width: 200px; margin-top: 2%;margin-left: 40%; margin-bottom: 5%;">Submit</button>
        </form>
        </div>
    </div>
@endsection
