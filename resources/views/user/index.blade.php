@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/style.css') }}" rel="stylesheet" />
<div id="home">
    
    <div class="landing-text button">

        @if (session('success'))
        <div class="alert alert-primary alert-dismissible" style="width:250px; margin-left: 41.5%;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! session('success') !!}
        </div>
        @endif

        <a href="{{  url('/login')}}" class="btn btn-md">Login</a> | <a href="{{ url('/register')}}" class="btn btn-md">Register</a>
    </div>
</div>
@endsection