
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title','Labaru')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/AdminLTE-2.4.3/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/AdminLTE-2.4.3/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/AdminLTE-2.4.3/bower_components/Ionicons/css/ionicons.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/AdminLTE-2.4.3/dist/css/skins/_all-skins.min.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="/AdminLTE-2.4.3/plugins/simplemde/simplemde.min.css">
  <!-- DateTimePicker -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <!-- Jasny -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

  <link rel="stylesheet" href="/AdminLTE-2.4.3/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Datatables -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/jquery.dataTables.min.css" /> -->
  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" />
  <!-- Select2 -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE-2.4.3/dist/css/AdminLTE.min.css">
  <!-- Custom CSS -->
  @yield('style')
  <link rel="stylesheet" type="text/css" href="/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  @include('layouts.backend.navbar')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('layouts.backend.sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  @include('layouts.backend.footer')

  <!-- Control Sidebar -->
  {{-- @include('layouts.backend.control') --}}

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/AdminLTE-2.4.3/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/AdminLTE-2.4.3/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/AdminLTE-2.4.3/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/AdminLTE-2.4.3/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/AdminLTE-2.4.3/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE-2.4.3/dist/js/demo.js"></script>
<!-- SimpleMDE -->
<script src="/AdminLTE-2.4.3/plugins/simplemde/simplemde.min.js"></script>
<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment-with-locales.min.js"></script>
<!-- DateTimePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<!-- Jasny -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<script src="/AdminLTE-2.4.3/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="/AdminLTE-2.4.3/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Datatables -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script> -->
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://js.pusher.com/4.3/pusher.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  });
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  // Initiate the Pusher JS library
  var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
      encrypted: true,
      cluster: 'ap1',
  });

  // Subscribe to the channel we specified in our Laravel Event
  var channel = pusher.subscribe('new-comment');

  // Bind a function to a Event (the full Laravel class)
  channel.bind('App\\Events\\NewComment', function(data) {

      // this is called when the event notification is received...
      $('.comment-wrapper').prepend(`
        <li>
          <a href="#">
            <div class="pull-left">
              <img src="/AdminLTE-2.4.3/dist/img/user-not.png" />
            </div>
            <h4>
              `+data.author+`
              <small><i class="fa fa-clock-o"></i></small>
            </h4>
            <p>`+data.comment+`</p>
          </a>
        </li>        
      `);

      // notification label
      var label = $('.comment-label span');
      var latest = parseInt(label.text());
      var count = latest + 1; 
      $(document).ready(function(){
        if ( count > 0 ) {
          label.show();
        }
        label.text(count);
      });
      
  });
</script>

@yield('script')

{!! Toastr::message() !!}

</body>
</html>
