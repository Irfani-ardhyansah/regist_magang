@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleLogin.css')}}" rel="stylesheet" />
<div id="home">
    <div class="landing-text">
      <div class="card-trasnparent" style="margin-left: 30%; height: 20%; width: 50%;">
        <div class="card-body">
          
          <form>
            <div class="col-lg-10 col-md-6 col-sm-6 col-xs-3">
              <div class="form-group">
                <label for="exampleInputEmail1"> <h5>Email</h5></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email">
              </div>
            </div>
            <div class="col-lg-10 col-md-6 col-sm-6 col-xs-3">
              <div class="form-group">
                <label for="exampleInputPassword1"> <h5>Password</h5> </label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password">
              </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 200px; margin-top: 5%;margin-left: 30%;">Submit</button>
          </form>
        
        </div>
      </div>
    </div>
</div>

@endsection