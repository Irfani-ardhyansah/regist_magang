@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/style.css') }}" rel="stylesheet" />
<div id="home">
    <div class="landing-text button">
        <a href="{{  url('/login')}}" class="btn btn-md">Login</a> | <a href="{{ url('/register')}}" class="btn btn-md">Register</a>
    </div>
</div>
@endsection