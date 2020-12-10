<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/'.$image.'.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
       
          <li class="nav-item">
            <a href="{{url('/home')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Beranda
                
              </p>
            </a>
          </li>
          @php
            $usr = Auth::user();
            $level = strtolower($usr->level);
          @endphp

          @if($level==='kasubag'||$level==='root')
          <li class="nav-item">
            <a href="{{route('pejabat.index')}}" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Pejabat
              </p>
            </a>
          </li>
          @endif
          @if($level=='client')
          <li class="nav-item">
            <a href="{{route('dokumen.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Register Dokumen
              </p>
            </a>
          </li>
          @endif
          @if($level=='operator')
          <li class="nav-item">
            <a href="{{route('arsip.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Arsip
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="#" onclick="window.APP.logout()" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
                
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>