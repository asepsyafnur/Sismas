<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('dashboard')}}" class="brand-link">
    <img src="{{asset('assets_dashboard/dist/img/logo.jpg')}}" alt="Ippmp Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Ippm Pangkep</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">Main Navigation</li>
        <li class="nav-item">
          <a href="{{url('dashboard')}}" class="nav-link {{request()->is('dashboard') ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('/')}}" target="_blank" class="nav-link {{request()->is('/') ? 'active' : ''}}">
            <i class="nav-icon fa fa-rocket"></i>
            <p>Lihat Situs</p>
          </a>
        </li>
        @if(auth()->user()->level == 'admin' || auth()->user()->level == 'humas' )
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              Pengaturan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('address') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Header</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('about') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>About</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Berita
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('list-berita') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Berita</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('post-berita') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Post Berita</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kategori') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        @if(auth()->user()->level == 'admin')
        <li class="nav-item">
          <a href="{{ url('users') }}" class="nav-link {{request()->is('users') ? 'active' : ''}}">
            <i class="nav-icon fa fa-address-book"></i>
            <p>BPH</p>
          </a>
        </li>
        @endif
        @if(auth()->user()->level == 'admin' || auth()->user()->level == 'ketua' || auth()->user()->level == 'sekretaris')
        <li class="nav-item">
          <a href="{{url('surat-masuk')}}" class="nav-link {{request()->is('surat-masuk') ? 'active' : ''}}">
            <i class="nav-icon fas fa-envelope-open-text"></i>
            <p>
              Surat Masuk
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('surat-keluar')}}" class="nav-link {{request()->is('surat-keluar') ? 'active' : ''}}">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Surat Keluar
            </p>
          </a>
        </li>
        @endif
        @if(auth()->user()->level == 'sekretaris' || auth()->user()->level == 'admin')
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p>
              Laporan
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{url('laporan-sm')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Masuk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{url('laporan-sk')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Surat Keluar</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        @if(auth()->user()->level == 'admin')
        <li class="nav-item">
          <a href="{{url('backup-db')}}" class="nav-link {{request()->is('backup-db') ? 'active' : ''}}">
            <i class="nav-icon fas fa-cloud-download-alt"></i>
            <p>
              Backup Database
            </p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>