<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{ asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          {{-- <a href="#" class="d-block">Admin</a> --}}
          <h3 class="ml-3 mt-2" style = "font-family:verdana;"> <span style="color: #FF8C00; " >kreasi</span><span style="color: #4169E1;">kode</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/admin/dashboard')}}" class="nav-link">
              <i class="nav-icon fa fa-folder"></i>
              <p>
                Data Magang
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/upload')}}" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Data Soal
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                  <i class=" nav-icon fas fa-sign-out-alt"></i>
                  <p>Log-out</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              {{-- <i class='nav-icon fas fa-sign-out-alt'></i>
              <p>
                Log-out
              </p> --}}
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>