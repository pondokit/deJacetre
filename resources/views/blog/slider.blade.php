<div id="slider" class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @foreach($slider as $key => $slide)
        <li class="queue-{{$key}}" data-target="#myCarousel" data-slide-to="{{ $key }}"></li>
      @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      @foreach($slider as $key => $slide)
        <div class="item queue-{{$key}}">
        	<div class="carousel-image">
          	<img src="{{ $slide->image_url }}" alt="Los Angeles" style="width:100%;">
          	<a href="{{ route('blog.post', $slide->slug) }}" class="over"></a>
        	</div>
          <div class="carousel-caption">
          	<p class="category">{{ $slide->category->title }}</p>
            <a href="{{ route('blog.post', $slide->slug) }}"><h2 class="title">{{ $slide->title }}</h2></a>
  	        <p class="info">{{ $slide->date }} <span class="bull">&bullet;</span> {{ $slide->author->name }}</p>
          </div>
        </div>
      @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
