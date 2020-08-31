
<nav class="navbar navbar-expand-lg fixed-top navbar-trans">
    <h1 class="ml-2" style = "font-family:verdana;"> <span style="color: #FF8C00;">kreasi</span><span style="color: #2352AA;">kode</span> <br>
      {{-- <img src="Logo.jpg" style="width:300px;height:300px; margin-left:3%; margin-top:1%;"> --}}
      {{-- <span style="font-size: 0.6em; letter-spacing: 9px;">indonesia</span> --}}
    </h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left: 55%;" id="navbarNav">
      <ul class="navbar-nav">
        @role('user')
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}"> Data <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('download')}}"> Download </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('upload')}}"> Upload </a>
        </li>
        <li class="nav-item logout">
          {{-- <a class="nav-link" href="/" tabindex="-1" aria-disabled="true"> Log-out </a> --}}
          <a href="{{ route('logout') }}" 
              onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="nav-link">
              <p>Log-out</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
        @endrole
      </ul>
    </div>
  </nav>
