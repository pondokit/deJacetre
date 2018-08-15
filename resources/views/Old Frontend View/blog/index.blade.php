@extends('layouts.main')

@section('content')

<!-- Main -->
<div id="home" class="container">

	<!-- Content -->
	<div id="content" class="col-md-8">
		@if(! $posts->count())
			<div class="alert alert-warning">Nothing Found!</div>
		@else

			@include('blog.alert')

			@foreach($posts as $post)
				<?php $commentsNumber = $post->comments->count(); ?>
	      <div class="thumbnail">
	        <a href="{{ route('blog.post', $post->slug) }}">

	        	@if($post->image_url)
	          	<img src="{{ $post->image_url }}" alt="{{ $post->image }}" class="img-responsive">
	          @endif
	          
	          <div class="caption">
	          	<h2>{{ $post->title }}</h2>
	            <p class="text-justify">{!! $post->excerpt !!}</p>
	          </div>
	        </a>
	        <div class="panel panel-default">
	          <ul class="panel-body list-inline">
	          	<li><i class="fa fa-user"></i><a class="text-muted" href="{{ route('author', $post->author->slug) }}"> {{ $post->author->name }}</a></li>
	          	<li><i class="fa fa-clock-o"></i> {{ $post->date }}</li>
	          	<li><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug) }}" class="text-muted"> {{ $post->category->title }}</a></li>
	          	<li><i class="fa fa-comments"></i><a href="{{ route('blog.post', $post->slug) }}#comments" class="text-muted"> {{ $post->commentsNumber('Comment') }}</a></li>
	          	<li><i class="fa fa-tags"></i>{!! $post->tags_html !!}</li>
	          	<li class="pull-right text-muted"><a href="{{ route('blog.post', $post->slug) }}">Continue Reading &raquo;</a></li>
	          </ul>
	        </div>
	      </div>
	    @endforeach
	  @endif

	  <!-- Pager -->
	  <ul class="pager">
	    {{ $posts->appends(request()->only(['term', 'month', 'year']))->links() }}
	  </ul>

	</div><!-- Content Closer -->

	@include('layouts.sidebar')

</div>

@endsection

@section('script')
<script type="text/javascript">
	$('document').ready(function() {

	});
</script>
@endsection