@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleData.css')}}" rel="stylesheet" />
<div class="padding" >
    <div class="container" style="margin-bottom: 5%; margin-top: 5%;">
      <div class="row" style="margin-left: 20%;">
        <div class="col-sm-10">
            <h1>Form Upload Jawaban</h1>
          <table class="table table-borderless" style="margin-top: 5%;">
            <tbody>
              <tr>
                <th>Nama File</th>
                <td> : </td>
                <td><input class="form-control" type="text" >
              </tr>
              <tr>
                <th>File</th>
                <td> : </td>
                <td>
                  <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="invalid-feedback">File Format RAR/ZIP</div>
                  </div><small>*File sudah dalam bentuk ZIP/RAR</small></td>
              </tr>
            </tbody>
          </table>
          <button type="submit" class="btn btn-primary" style="width: 200px; margin-top: 2%;margin-left: 30%;margin-bottom: 10%;">Upload</button>
        </div>
      </div>
      </div>
      </div>
@endsection