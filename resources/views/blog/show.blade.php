@extends('layouts.main')

@section('post', 'active')

@section('content')
 <!-- Main -->
<div id="post" class="container">

  <!-- Content -->
  <div id="content" class="col-sm-8">

    <div class="thumbnail">
      @if($post->image_url)
        <img src="{{ $post->image_url }}" alt="{{ $post->image }}" class="img-responsive" style="width: 100%;">
      @endif
      <div class="caption head">
        <a href="{{ route('category', $post->category->slug) }}" class="category">{{ $post->category->title }}</a>
        <h2 class="title">{{ $post->title }}</h2>
        <p class="info text-muted">
          <a>{{ $post->date }}</a> <span class="bull">&bullet;</span> 
          <a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a> <span class="bull">&bullet;</span> 
          {!! $post->tags_html !!} <span class="bull">&bullet;</span> 
          <a href="#comments">{{ $post->commentsNumber('Comment') }}</a>
        </p>
      </div>
      <div class="caption body clearfix">
        <div class="content">{!! $post->body_html !!}</div>
        <div class="tags pull-left">
          <h4>Tags :</h4>
          <a href="#" class="tag"><b>#</b> this</a>
          <a href="#" class="tag"><b>#</b> not</a>
          <a href="#" class="tag"><b>#</b> less</a>
          <a href="#" class="tag"><b>#</b> CSS</a>
          <a href="#" class="tag"><b>#</b> day</a>
        </div>
        <div class="extra pull-right">
          <p><i class="fa fa-eye"></i> {{ $post->view_count }} {{ str_plural('View', $post->view_count) }}</p>
          <a href="" title="Share on facebook"><i class="fa fa-facebook"></i></a>
          <a href="" title="Share on twitter"><i class="fa fa-twitter"></i></a>
          <a href="" title="Share on google"><i class="fa fa-google-plus"></i></a>
        </div>
      </div>
    </div><!-- Thumbnail Closer -->

    <div id="author" class="thumbnail">
      <div class="caption">
        <div class="media">
          <div class="media-left media-top">
            <div class="media-image">
              <img class="media-object" src="{{ $post->author->gravatar() }}" alt="">
            </div>
          </div>
          <div class="media-body media-caption">
            <a href=""><h4 class="media-heading">{{ $post->author->name }}</h4></a>
            <p class="info text-muted">{{ $post->commentsNumber('Comment') }}</p>
            <p class="bio">
              {{ $post->author->bio }}
            </p>
          </div>
        </div>
      </div>
    </div><!-- Thumbnail Closer -->

    @include('blog.comment')

  </div><!-- Content Closer -->

  @include('layouts.sidebar')

</div><!-- Main Closer -->

@endsection