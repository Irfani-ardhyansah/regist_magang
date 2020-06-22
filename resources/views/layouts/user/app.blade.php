<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Landing Page Website Tutorial</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>

  @include('layouts.user.header')

  @yield('content')

<footer class="container-fluid text-center"  style="position: absolute; height: 30%;">
  <div class="row">
    <div class="col-sm-4">
      <h3>Contact Us</h3>
      <br>
      <h4>Our Address and contact info here.</h4>
    </div>
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
      <h3>Connect</h3>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-google"></a>
      <a href="#" class="fa fa-instagram"></a>
      <a href="#" class="fa fa-youtube-play"></a>
    </div>
  </div>
</footer>

<script type="text/javascript"> 
  $('.addanggota').on('click', function(){
    addanggota();
  });
  function addanggota(){
    var anggota = '<div class="card" style=" margin-top: 1%; width: 50rem; height: 35rem; position: relative; border:none;"> <div class="card-body"> <div class="row"> <div class="col-md-5"> <div class="form-group"> <label for="exampleInputEmail1"> Nama Anggota</label> <input type="text" class="form-control" name="nama[]" value="{{ old('nama[]') }}"> </div> </div> <div class="col-md-5"> <div class="form-group"> <label for="exampleInputEmail1"> NIM Anggota</label> <input type="number" class="form-control" name="nim[]" value="{{ old('nim[]') }}"> </div> </div> </div> <div class="row"> <div class="col-md-5"> <div class="form-group"> <label for="exampleInputEmail1"> No HP</label> <input type="number" class="form-control" name="no_hp[]"> </div> </div> <div class="col-md-5"> <div class="form-group"> <label for="exampleInputEmail1"> Sosmed</label> <input type="text" class="form-control" name="sosmed[]" placeholder="IG"> </div> </div> </div> <div class = "row"> <div class="col-md-4"> <div class="form-group"> <label> Gender Anggota </label> <select class="form-control" name="jenis_kelamin[]" value="{{ old('jenis_kelamin[]') }}"> <option> - </option> <option value="Laki-laki">Laki - laki</option> <option value="Perempuan">Perempuan</option> </select> </div> </div> <div class="col-md-6"> <div class="form-group"> <label> Email Anggota </label> <input type="email" class="form-control" name="email_anggota[]" value="{{ old('email_anggota[]') }}"> </div> </div> <div class="col-lg-10 col-md-6 col-sm-6 col-xs-3"> <div class="form-group"> <label> Alamat Anggota</label> <textarea class="form-control" name="alamat[]" rows="3" style="resize: none;"></textarea> </div> </div> <div class="col-lg-5 col-md-6 col-sm-6 col-xs-3"> <label for="exampleInputEmail1"> Bidang Minat </label> <div class="form-group"> <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" value="Desain UI / UX" name="bidang_minat[]"> <label class="form-check-label" for="inlineCheckbox1">Desain UI / UX</label> </div> <div class="form-check form-check-inline" style="margin-left:6%"> <input class="form-check-input" type="checkbox" value="Frontend" name="bidang_minat[]"> <label class="form-check-label" for="inlineCheckbox2">Frontend</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" value="Database" name="bidang_minat[]"> <label class="form-check-label" for="inlineCheckbox2">Database</label> </div> <div class="form-check form-check-inline" style="margin-left:18%"> <input class="form-check-input" type="checkbox" value="Android" name="bidang_minat[]"> <label class="form-check-label" for="inlineCheckbox2">Android</label> </div> <div class="form-check form-check-inline" > <input class="form-check-input" type="checkbox" value="Web Programing" name="bidang_minat[]"> <label class="form-check-label" for="inlineCheckbox2">Web Programing</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" value="Developer" name="bidang_minat[]"> <label class="form-check-label" for="inlineCheckbox2">Developer</label> </div> </div> </div> <div class="col-md-5"> <div class="form-group"> <label> Keahlian </label> <select class="form-control" name="keahlian[]" value="{{ old('keahlian[]') }}"> <option> - </option> <option value="Desain UI / UX">Desain UI / UX</option> <option value="Backend">Backend</option> <option value="Dev Android">Dev Android</option> </select> </div> </div> </div> <span href="#" class="remove  btn btn-danger" style="margin-left: 85%;padding: 0.1px 0.1px;"><i class="fa fa-window-close" style="font-size: 13px;"></i></span> <br> </div> </div>';
    $('.anggota').append(anggota);
  };
  $('.remove').live('click', function() {
    $(this).parent().parent().parent().parent().parent().parent().parent().parent().remove();
  });
</script>
</body>
</html>