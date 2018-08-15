<!-- Sidebar -->
<div id="sidebar" class="col-sm-4">

  <!-- Category -->
  <div id="category" class="panel panel-default">
    <div class="panel-heading"><h3>CATEGORY</h3><span class="head-line"></span></div>
    <div class="panel-body">
      <div class="list-group">

        @foreach($categories as $category)
          <a href="{{ route('category', $category->slug) }}" class="list-group-item"><span class="bull">&bullet;</span> {{ $category->title }} <span class="badge">{{ $category->posts->count() }}</span></a>
        @endforeach

      </div>
    </div>
  </div><!-- Category Closer -->

  <!-- Popular Post -->
  <div id="popular" class="panel panel-default">
    <div class="panel-heading"><h3>POPULAR POST</h3><span class="head-line"></span></div>
    <div class="panel-body">

      @foreach($popularPosts as $post)
        <a href="{{ route('blog.post',$post->slug) }}" class="media">
          <div class="media-left media-top">
            <div class="media-image">
              <img class="media-object" src="{{ $post->image_thumb_url }}" alt="">
            </div>
          </div>
          <div class="media-body media-caption">
            <h4 class="media-heading">{{ $post->title }}</h4>
            <p class="info text-muted">{{ $post->date }} <span class="bull">&bullet;</span> {{ $post->author->name }}</p>
          </div>
        </a>
      @endforeach


    </div>
  </div><!-- Popular Post Closer -->

  <!-- Tags -->
  <div id="tags" class="panel panel-default">
    <div class="panel-heading"><h3>TAGS</h3><span class="head-line"></span></div>
    <div class="panel-body">
      @foreach($tags as $tag)
        <a href="{{ route('tag', $tag->slug) }}" class="tag"><b>#</b> {{ $tag->name }}</a>
      @endforeach
    </div>
  </div><!-- Tags Closer -->

  <!-- Archives -->
  <div id="archives" class="panel panel-default">
    <div class="panel-heading"><h3>ARCHIVES</h3><span class="head-line"></span></div>
    <div class="panel-body">
      <div class="list-group">
        @foreach($archives as $archive)
          <a href="{{ route('blog', ['month' => $archive->month, 'year' => $archive->year]) }}" class="list-group-item"><span class="bull">&bullet;</span> {{ $archive->month . " " . $archive->year }} <span class="badge">{{ $archive->post_count }}</span></a>
        @endforeach

      </div>
    </div>
  </div><!-- Archives Closer -->

</div><!-- Sidebar Closer -->