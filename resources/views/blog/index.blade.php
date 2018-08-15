@extends('layouts.main')

@section('home', 'active')

@section('content')

<!-- Slider / Carousel -->
@include('blog.slider')

<!-- Main -->
<div id="home" class="container">

	<!-- Content -->
	<div id="content" class="col-sm-8">
    @if(! $posts->count())
      <div class="alert alert-warning">Nothing Found!</div>
    @else

      @include('blog.alert')

      @foreach($posts as $post)
        <?php $commentsNumber = $post->comments->count(); ?>
        <div class="thumbnail">
        	<div class="caption head">
            <a href="{{ route('category', $post->category->slug) }}" class="category">{{ $post->category->title }}</a>
            <a href="{{ route('blog.post', $post->slug) }}"><h2 class="title">{{ $post->title }}</h2></a>
            <p class="info text-muted">
            	<a>{{ $post->date }}</a> <span class="bull">&bullet;</span> 
            	<a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a> <span class="bull">&bullet;</span> 
            	{!! $post->tags_html !!} <span class="bull">&bullet;</span> 
            	<a href="{{ route('blog.post', $post->slug) }}#comment">{{ $post->commentsNumber('Comment') }}</a>
            </p>
          </div>
          <a href="{{ route('blog.post', $post->slug) }}" class="image">

          	@if($post->image_url)
              <img src="{{ $post->image_url }}" alt="{{ $post->image }}" class="img-responsive" style="width: 100%;">
          	  <span class="black"></span>
            @endif

          </a>
          <div class="caption">
            <p class="excerpt">{!! $post->excerpt !!} […]</p>
            <a href="{{ route('blog.post', $post->slug) }}" class="more">Read More</a>
          </div>
        </div><!-- Thumbnail Closer -->
      @endforeach
    @endif

    <!-- Pager -->
    <ul class="pager">
      {{ $posts->appends(request()->only(['term', 'month', 'year']))->links() }}
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