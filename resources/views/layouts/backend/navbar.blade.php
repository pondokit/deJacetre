<header class="main-header">
    <!-- Logo -->
    <a href="/AdminLTE-2.4.3/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <?php $currentUser = Auth::user(); ?>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning comment-warning"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have message</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu comment-wrapper">
                  <!-- end message -->
                </ul>
              </li>
              <!-- <li class="footer"><a href="#">See All Messages</a></li> -->
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/image/{{ App\User::find($currentUser->id)->image }}" class="user-image" alt="{{ $currentUser->name }}">
              <span class="hidden-xs">Hai, {{ $currentUser->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/image/{{ App\User::find($currentUser->id)->image }}" />

                <p>
                  <?php $userRole = $currentUser->roles->first() !== NULL ? $currentUser->roles->first()->display_name : "Noob" ?>

                  {{ $currentUser->name }} - {{$userRole}}
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>

              <!-- Menu Body -->
              <!-- <li class="user-body"> -->
                <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              <!-- </li> -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/edit-account') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form method="post" action="{{ route('logout') }}">
                    <button class="btn btn-default btn-flat">Sign out</button>
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
