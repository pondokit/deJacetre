@extends('layouts.main')

@section('about', 'active')

@section('content')

<!-- Slider / Carousel -->
@include('blog.slider')

<!-- Main -->
<div id="home" class="container">

	<!-- Content -->
	<div id="content" class="col-sm-8">
    

      IM JUST ALITTLE BUDDY MASDIISJDIJIAJSD

    <!-- Pager -->
    <ul class="pager">
      PAGER LOADER
    </ul>

	</div><!-- Content Closer -->

	<!-- Sidebar -->
	@include('layouts.sidebar')

</div><!-- Main Closer -->

@endsection

@section('script')
<script type="text/javascript">

  $('document').ready(function(){
    $('.queue-0').addClass('active');
  });

</script>
@endsection
