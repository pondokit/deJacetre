<!DOCTYPE html>
<html>
<head>
	<title>De Jacetre</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Playball|Lora|Rakkas" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/DeJacetre/css/style.css">
	@yield('style')
</head>
<body>

	<!-- Logo -->
	<div class="container-fluid">
		<a href="{{route('blog')}}" id="logo" class="text-center">De <span>J</span>acetre</a>
	</div>

	<!-- Navbar -->
	<nav id="header" class="navbar navbar-default">
	  <div class="container-fluid">
	    <ul class="nav navbar-nav">
	      <li class="@yield('home')"><a href="{{ route('blog') }}">Home</a></li>
	      <li class="@yield('post')"><a href="#">Blog</a></li>
	      <li><a href="#">Contact</a></li>
	      <li><a href="#">About</a></li>
	    </ul>
	    <form class="navbar-form navbar-right" action="{{ route('blog') }}">
	      <div class="input-group">
	        <input type="text" name="term" value="{{ request('term') }}" class="form-control" placeholder="Search">
	        <div class="input-group-btn">
	          <button class="btn btn-default" type="submit">
	            <i class="glyphicon glyphicon-search"></i>
	          </button>
	        </div>
	      </div>
	    </form>
	  </div>
	</nav>

	@yield('content')

	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="company pull-left">
					&copy;<a href="#">De Jacetre</a> 2017. All right reserved.
				</div>
				<div class="social pull-right">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-pinterest"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		// When the user scrolls the page, execute myFunction 
		window.onscroll = function() {myFunction()};

		// Get the header
		var header = document.getElementById("header");

		// Get the offset position of the navbar
		var sticky = header.offsetTop;

		// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
		function myFunction() {
		  if (window.pageYOffset > sticky) {
		    header.classList.add("sticky");
		  } else {
		    header.classList.remove("sticky");
		  }
		}
	</script>
	@yield('script')
</body>
</html>