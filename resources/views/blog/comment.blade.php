<div id="comment" class="thumbnail">
  <div class="caption">
    <div class="comment-list">
      <h3>{{ $post->commentsNumber('Comment') }}</h3>

      @foreach($postComments as $comment)
        <div class="media">
          <div class="media-left media-top">
            <div class="media-image">
              <img class="media-object" src="/DeJacetre/img/Post_Image_7_thumb.jpg" alt="">
            </div>
          </div>
          <div class="media-body media-caption">
            <a href=""><h4 class="media-heading">{{ $comment->author_name }}</h4></a>
            <p class="info text-muted">{{ $comment->date }}</p>
            <div class="bio">
              {!! $comment->body_html !!}
            </div>
          </div>
        </div>
      @endforeach

    </div>

    <nav class="pager" style="margin: 0 15px 30px;">
      {!! $postComments->fragment("comments")->links() !!}
    </nav>

    <div class="comment-post">
      <h3>Leave a Comment</h3>

      @if (session('message'))
        <div class="alert alert-info">
          {{ session('message') }}
        </div>
      @endif

      {!! Form::open(['route' => ['blog.comments', $post->slug]]) !!}
        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
          {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'comment', 'rows' => 7]) !!}

          @if ($errors->has('body'))
            <span class="help-block">
              <strong>{{ $errors->first('body') }}</strong>
            </span>
          @endif
        </div>
        <div class="row">
          <div class="form-group col-sm-4 {{ $errors->has('author_name') ? 'has-error' : '' }}">
            <label for="name">Name:</label>
            {!! Form::text('author_name', null, ['class' => 'form-control', 'id' => 'name']) !!}

            @if ($errors->has('author_name'))
              <span class="help-block">
                <strong>{{ $errors->first('author_name') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-sm-4 {{ $errors->has('author_email') ? 'has-error' : '' }}">
            <label for="email">Email:</label>
            {!! Form::text('author_email', null, ['class' => 'form-control', 'id' => 'email']) !!}

            @if ($errors->has('author_email'))
              <span class="help-block">
                <strong>{{ $errors->first('author_email') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-sm-4">
            <label for="web">Website:</label>
            {!! Form::text('author_url', null, ['class' => 'form-control', 'id' => 'web']) !!}
          </div>
        </div>
        <button type="submit" class="btn btn-danger form-control"><b>POST COMMENT</b></button>
        {!! Form::hidden('post_id', $post->id) !!}
      {!! Form::close() !!}
    </div>
  </div>
</div><!-- Thumbnail Closer -->