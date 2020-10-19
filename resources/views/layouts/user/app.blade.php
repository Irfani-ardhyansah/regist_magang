<!DOCTYPE html>
<html>
<head>
  <title>Registrasi Magang</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{asset('Logo-icon.jpg')}}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>

  @include('layouts.user.header')

  @yield('content')

<footer class="container-fluid text-center" id="footer" style="position: absolute; height: 420px; @media(max-height: auto; max-width: 332px)">
  <div class="row" style="height:auto;">
    <div class="col-lg-4 col-xs-12 mt-5">
      <h3>Address</h3>
      <br>
      <h6>Jl. Garuda No.78A, Manukan, Condong Catur, Sleman, Kec. Depok, Kabupaten Sleman, DIY 55283</h6>
    </div>
    <div class="col-lg-4 col-xs-12 mt-5">

    </div>
    <div class="col-lg-4 col-xs-12 mt-5">
      <h3>Connect</h3>
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-twitter"></a>
      <a href="#" class="fa fa-google"></a>
      <a href="#" class="fa fa-instagram"></a>
      <a href="#" class="fa fa-youtube-play"></a>
    </div>
  </div>
  <div class="row mt-4" style="height:auto;">
    <div class="col copyright text-center">
      <p><small class="text-white-50">
        All Rights Reserved &copy; Team Magang Politeknik Negeri Madiun 2020
      </small></p>
    </div>
  </div>
</footer>

{{-- <footer>
  <div class="mt-5 pt-5 pb-5 footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-xs-12">
          <h2>Social</h2>
          <ul class="social">
            <li><a href="#"><i class="fa fa-faceboook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-xs-12"></div>

        <div class="col-lg-4 col-xs-12 location">
          <h4 class="mt-lg-0 mt-sm-4">Location</h4>
          <p><i class="fa fa-map-marker">Jl. Garuda No.78A, Manukan, Condong Catur, Sleman, Kec. Depok, Kabupaten Sleman, DIY 55283</i></p>
          <p><i class="fa fa-phone">+62 - </i></p>
          <p><i class="fa fa-envelope-o">email@kreasikode.com</i></p>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col copyright text-center">
          <p><small class="text-white-50">
            All Rights Reservec &copy; Team Maganng Politeknik Negeri Madiun 2020
          </small></p>
        </div>
      </div>
    </div>
  </div>
</footer> --}}

<script type="text/javascript"> 
  $('.addanggota').on('click', function(){
    addanggota();    
  });
  function addanggota(){
    var y = $('.nama').length;
    var x = parseInt(y);
    // $( '.tot' ).text( "There are " + x + "Click to add more."); "'+data[i].Id+'"
    var anggota = '<div> <div class="card" style=" margin-top: 2%; width: 50rem; height: 35rem; position: relative; border:none;"> <div class="card-body"> <div class="row"> <div class="col-lg-5 col-md-5 col-4"> <div class="form-group"> <label> Nama Anggota</label> <input type="text" class="form-control nama @error('nama') is-invalid:'' @enderror" name="nama[]" value="{{ old('nama[]') }}" required> </div> </div> <div class="col-lg-5 col-md-5 col-4"> <div class="form-group"> <label> NIM Anggota</label> <input type="number" class="form-control @error('nim') is-invalid:'' @enderror" name="nim[]" value="{{ old('nim[]') }}" required> </div> </div> </div> <div class="row"> <div class="col-lg-5 col-md-5 col-4"> <div class="form-group"> <label> No HP</label> <input type="number" class="form-control @error('no_hp') is-invalid:'' @enderror" name="no_hp[]"> </div> </div> <div class="col-lg-5 col-md-5 col-4"> <div class="form-group"> <label > Sosmed</label> <input type="text" class="form-control" name="sosmed[]" placeholder="IG" required> </div> </div> </div> <div class = "row"> <div class="col-lg-4 col-md-4 col-3"> <div class="form-group"> <label> Gender Anggota </label> <select class="form-control @error('jenis_kelamin') is-invalid:'' @enderror" name="jenis_kelamin[]" value="{{ old('jenis_kelamin[]') }}" required> <option> - </option> <option value="Laki-laki">Laki - laki</option> <option value="Perempuan">Perempuan</option> </select> </div> </div> <div class="col-lg-6 col-md-6 col-5"> <div class="form-group"> <label> Email Anggota </label> <input type="email" class="form-control @error('email_anggota') is-invalid:'' @enderror" name="email_anggota[]" value="{{ old('email_anggota[]') }}" required> </div> </div> <div class="col-lg-10 col-md-10 col-8"> <div class="form-group"> <label> Alamat Anggota</label> <textarea class="form-control @error('alamat') is-invalid:'' @enderror" name="alamat[]" rows="3" style="resize: none;" required></textarea> </div> </div> <div class="col-lg-5 col-md-5 col-5"> <label> Bidang Minat </label> <div class="form-group"> <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" value="UI / UX" name="bidang_minat['+x+'][]"> <label class="form-check-label" for="inlineCheckbox1">UI / UX</label> </div> <div class="form-check form-check-inline" style="margin-left:6%"> <input class="form-check-input" type="checkbox" value="Frontend" name="bidang_minat['+x+'][]"> <label class="form-check-label" for="inlineCheckbox2">Frontend</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" value="Database" name="bidang_minat['+x+'][]"> <label class="form-check-label" for="inlineCheckbox2">Database</label> </div> <div class="form-check form-check-inline" > <input class="form-check-input" type="checkbox" value="Web Programing" name="bidang_minat['+x+'][]"> <label class="form-check-label" for="inlineCheckbox2">Web Programing</label> </div> <div class="form-check form-check-inline"> <input class="form-check-input" type="checkbox" value="Android Developer" name="bidang_minat['+x+'][]"> <label class="form-check-label" for="inlineCheckbox2">Android Developer</label> </div> </div> </div> <div class="col-lg-5 col-md-5 col-3"> <div class="form-group"> <label> Keahlian </label> <select class="form-control" name="keahlian[]" value="{{ old('keahlian[]') }}" required> <option> - </option> <option value="UI / UX">UI / UX</option> <option value="Web Programing">Web Programing</option> <option value="Android Developer">Android Developer</option> <option value="Frontend">Frontend</option> <option value="Database">Database</option> </select> </div> </div> </div> <div class="col-lg-12 col-10"> <div class="form-group"> <span class="remove  btn btn-danger" style="margin-left: 70%;padding: 0.1px 0.1px;"><i class="fa fa-window-close" style="font-size: 13px;"></i></span></div> </div> </div> </div> </div>';
    $('.anggota').append(anggota);
  };
  $(document).on('click', ".remove", function() {
    $(this).parent().parent().parent().parent().remove();
  });
</script>
</body>
</html>