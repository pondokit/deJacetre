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

      <?php
        $currentUser = Auth::user();
        $notif = $comment->count();
      ?>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle comment-label" data-toggle="dropdown">
              <i class="fa fa-users"></i>
              <span class="label label-warning">
                5
              </span>
            </a>
          </li>
          <li class="dropdown messages-menu">

            <!-- Label -->
            <a href="#" class="dropdown-toggle comment-label" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" style="{{ ($notif == 0) ? 'display: none;' : '' }}">
                {{ $notif }}
              </span>
            </a>

            <!-- Notifications -->
            <ul class="dropdown-menu">
              <li class="header comment-header">
                @if($notif > 0)
                  <p>You have {{ $notif }} {{ str_plural('notification', $notif) }}</p>
                @else
                  <p>You don't have any notification</p>
                @endif
              </li>
              <li>
                <ul class="menu comment-wrapper">
                  @foreach($comment as $com)
                    <li>
                      <a href="{{ route('comments.index') }}">
                        <div class="pull-left">
                          <img src="/AdminLTE-2.4.3/dist/img/user-not.png" />
                        </div>
                        <h4>
                          {{ $com->author_name }}
                          <small><i class="fa fa-clock-o"></i></small>
                        </h4>
                        <p>{{ Str::words($com->body, 4, '...') }}</p>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="{{ route('comments.index') }}">Show All Comments</a></li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ (App\User::find($currentUser->id)->image && file_exists(public_path().'/image/'.App\User::find($currentUser->id)->image)) ? '/image/'.App\User::find($currentUser->id)->image : $currentUser->gravatar() }}" class="user-image" alt="{{ $currentUser->name }}">
              <span class="hidden-xs">Hai, {{ $currentUser->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ (App\User::find($currentUser->id)->image && file_exists(public_path().'/image/'.App\User::find($currentUser->id)->image)) ? '/image/'.App\User::find($currentUser->id)->image : $currentUser->gravatar() }}" />
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
