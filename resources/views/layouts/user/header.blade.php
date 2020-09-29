<nav class="navbar navbar-expand-lg fixed-top navbar-trans" style="max-width:100%;">
    <h1 class="ml-2" style = "font-family:verdana;"> 
      <a href="{{url('/')}}"> 
        <span style="color: #FF8C00;">kreasi</span><span style="color: #2352AA;">kode</span> <br>
      </a>
    </h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <i class="nav-icon fa fa-bars" aria-hidden="true" style="color: #2352AA;"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left: 55%;" id="navbarNav">
      <ul class="navbar-nav float-right">
        @role('user')
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}"> Data <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('download')}}"> Download </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('upload_user')}}"> Upload </a>
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
