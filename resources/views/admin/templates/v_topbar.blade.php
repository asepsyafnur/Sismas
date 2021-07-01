<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <img src="{{ asset('img_users/'. Auth::user()->image) }}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline text-capitalize">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="{{ asset('img_users/'. Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
          <p class="text-capitalize">
            {{ Auth::user()->name }} - {{Auth::user()->level}}
          </p>
        </li>
        
        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="{{ url('profile/' . Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-default btn-flat float-right">Sign out</button>
          </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>