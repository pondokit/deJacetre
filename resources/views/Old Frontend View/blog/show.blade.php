@extends('layouts.main')

@section('content')
	<!-- Main -->
	<div id="post" class="container">

		<!-- Content -->
		<div id="content" class="col-md-8">

      <div class="thumbnail">

    		@if($post->image_url)
    	  	<img src="{{ $post->image_url }}" alt="{{ $post->image }}" class="img-responsive">
    	  @endif

      	<div class="caption">
        	<h2>{{ $post->title }}</h2>
        	<ul class="list-inline">
	          	<li><i class="fa fa-user"></i><a class="text-muted" href="{{ route('author', $post->author->slug) }}"> {{ $post->author->name }}</a></li>
	          	<li><i class="fa fa-clock-o"></i> {{ $post->date }}</li>
              <li><i class="fa fa-folder"></i><a href="{{ route('category', $post->category->slug) }}" class="text-muted"> {{ $post->category->title }}</a></li>
	          	<li><i class="fa fa-tags"></i>{!! $post->tags_html !!}</li>
	          	<li><i class="fa fa-comments"></i><a href="#comments" class="text-muted"> {{ $post->commentsNumber('Comment') }}</a></li>
        	</ul>
          <div class="text-justify">{!! $post->body_html !!}</div>
        </div>
      </div>

      <!-- Author -->
      <div id="author" class="panel panel-default">
      	<div class="panel-body">
      		<div class="media">
      		  <div class="media-left media-top">
      		  	<span>
      		    	<img src="{{ $post->author->gravatar() }}" class="media-object">
      		  	</span>
      		  </div>
      		  <div class="media-body">
      		    <h4 class="media-heading">{{ $post->author->name }}</h4>
      		    <small class="text-muted"><i class="fa fa-newspaper-o"></i> 
                {{ $post->commentsNumber('Comment') }}
              </small>
      		    <p class="text-muted">{{ $post->author->bio }}</p>
      		  </div>
      		</div>
      	</div>
      </div>

      <!-- Comments -->
      @include('blog.comment')
      
		</div><!-- Content Closer -->

		@include('layouts.sidebar')

	</div><!-- Main Closer -->

@endsection