<!DOCTYPE html>
<html>
<head>
	<title>AbidBlog</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Sunflower:300,500,700" rel="stylesheet">
	<!-- User defined style -->
	<link rel="stylesheet" type="text/css" href="/AbidBlog/css/style.css">
</head>
<body>

	<div class="wrapper">
		<!-- Navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		  	<div class="col-md-12">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="{{ route('blog') }}">ABIDBLOG.COM</a>
			    </div>
			    <ul class="nav navbar-nav navbar-right">
			      <li class="active"><a href="{{ route('blog') }}">Blog</a></li>
			      <li><a href="#">About</a></li>
			      <li><a href="#">Contact</a></li>
			    </ul>
		  	</div>
		  </div>
		</nav>

		@yield('content')

	</div><!-- Wrapper Closer -->

	<!-- Footer -->
	<div id="footer" class="panel panel-default">
		<div class="container">
			<div class="col-md-12">
			  <div class="panel-body">
			  	<span class="text-muted pull-left">&copy; 2018 Abid Khairy</span>
			  	<ul class="list-inline pull-right">
			  		<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
			  		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			  		<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			  		<li><a href="#"><i class="fa fa-github"></i></a></li>
			  	</ul>
			  </div>
			</div>
		</div>
	</div>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	@yield('script')
</body>
</html>