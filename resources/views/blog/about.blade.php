@extends('layouts.main')

@section('about', 'active')

@section('content')

<!-- Slider / Carousel -->
@include('blog.slider')

<!-- Main -->
<div id="home" class="container">

	<!-- Content -->
	<div id="content" class="col-sm-8">
      <div class="thumbnail">
        <div class="caption head">
          <h2 class="title">About Moi</h2>
        </div>
        <div class="caption">
            <p>{!! $about->about !!}</p>
        </div>
      </div>
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
