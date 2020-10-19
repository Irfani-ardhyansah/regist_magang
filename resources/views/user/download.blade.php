@extends('layouts.user.app')

@section('content')
<link href="{{ asset('user/css/styleData.css')}}" rel="stylesheet" />

<div class="padding">
    <div class="container"  style="margin-top: 5%; margin-bottom: 5%;">
        <div class="row" style="margin-left: 10%;">
            <div class="col-sm-11 table">
                <h1 class="text-center mb-5">Tabel Soal</h1>
                <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama File</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soal as $row)
                    <tr>
                        <th scope="row"> {{$loop->iteration}} </th>
                        <td> {{$row->item}} </td>
                        <td> <a href="/data_soal/{{$row->item}}" class="btn btn-link btn-sm">Unduh</a></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection