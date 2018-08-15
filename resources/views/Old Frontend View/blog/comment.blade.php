<div id="comments" class="panel panel-default">
  <div class="panel-body">
    <h3 class="text-center"><i class="fa fa-comments"></i> {{ $post->commentsNumber('Comment') }}</h3>

    <!-- Comment list -->
    @foreach($postComments as $comment)
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>{{ $comment->author_name }} <small>{{ $comment->date }}</small></h4>
          <hr>
          <div>{!! $comment->body_html !!}</div>
        </div>
      </div>
    @endforeach

    {{--
    <div class="panel panel-default">
      <div class="panel-body">
        <h4>John Doe <small>January 14, 2016</small></h4>
        <hr>
        <div>
          <p>
            Donec tempor, diam vel faucibus tempor, ex leo vulputate dui, nec molestie nisi nulla id libero. Vestibulum sollicitudin est at tristique tincidunt. Integer a accumsan tortor. Sed mollis euismod varius. Vestibulum magna sem, blandit ac luctus id, luctus non justo.
          </p>
          <p>
            Sed sit amet lorem hendrerit, rhoncus felis at, tincidunt tellus. Donec dignissim vitae nibh posuere venenatis. Vivamus tristique mattis pellentesque. Nullam at lorem venenatis, finibus magna in, gravida metus.
          </p>
        </div>

        <!-- Nested -->
        <div class="panel panel-default nested-1">
          <div class="panel-body">
            <h4>John Doe <small>January 14, 2016</small></h4>
            <hr>
            <div>
              <p>
                Donec tempor, diam vel faucibus tempor, ex leo vulputate dui, nec molestie nisi nulla id libero. Vestibulum sollicitudin est at tristique tincidunt. Integer a accumsan tortor. Sed mollis euismod varius. Vestibulum magna sem, blandit ac luctus id, luctus non justo.
              </p>
              <p>
                Sed sit amet lorem hendrerit, rhoncus felis at, tincidunt tellus. Donec dignissim vitae nibh posuere venenatis. Vivamus tristique mattis pellentesque. Nullam at lorem venenatis, finibus magna in, gravida metus.
              </p>
            </div>
          </div>
        </div>

        <div class="panel panel-default nested-1">
          <div class="panel-body">
            <h4>John Doe <small>January 14, 2016</small></h4>
            <hr>
            <div>
              <p>
                Donec tempor, diam vel faucibus tempor, ex leo vulputate dui, nec molestie nisi nulla id libero. Vestibulum sollicitudin est at tristique tincidunt. Integer a accumsan tortor. Sed mollis euismod varius. Vestibulum magna sem, blandit ac luctus id, luctus non justo.
              </p>
              <p>
                Sed sit amet lorem hendrerit, rhoncus felis at, tincidunt tellus. Donec dignissim vitae nibh posuere venenatis. Vivamus tristique mattis pellentesque. Nullam at lorem venenatis, finibus magna in, gravida metus.
              </p>
            </div>

            <!-- Nested on Nested -->
            <div class="panel panel-default nested-2">
              <div class="panel-body">
                <h4>John Doe <small>January 14, 2016</small></h4>
                <hr>
                <div>
                  <p>
                    Donec tempor, diam vel faucibus tempor, ex leo vulputate dui, nec molestie nisi nulla id libero. Vestibulum sollicitudin est at tristique tincidunt. Integer a accumsan tortor. Sed mollis euismod varius. Vestibulum magna sem, blandit ac luctus id, luctus non justo.
                  </p>
                  <p>
                    Sed sit amet lorem hendrerit, rhoncus felis at, tincidunt tellus. Donec dignissim vitae nibh posuere venenatis. Vivamus tristique mattis pellentesque. Nullam at lorem venenatis, finibus magna in, gravida metus.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    --}}

  </div><!-- Comment Panel Body Closer -->

  <nav class="pager" style="margin: 0 15px 30px;">
    {!! $postComments->fragment("comments")->links() !!}
  </nav>

  <hr class="row">

  <!-- Post Comment -->
  <div class="panel-body">
    <h3 class="text-center">Leave a comment</h3>

    @if (session('message'))
      <div class="alert alert-info">
        {{ session('message') }}
      </div>
    @endif

    {!! Form::open(['route' => ['blog.comments', $post->slug]]) !!}
        <div class="form-group required {{ $errors->has('author_name') ? 'has-error' : '' }}">
          <label for="name">Name <small class="text-danger">*</small></label>
          {!! Form::text('author_name', null, ['class' => 'form-control', 'id' => 'name']) !!}

          @if ($errors->has('author_name'))
            <span class="help-block">
              <strong>{{ $errors->first('author_name') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group required {{ $errors->has('author_email') ? 'has-error' : '' }}">
          <label for="email">Email <small class="text-danger">*</small></label>
          {!! Form::text('author_email', null, ['class' => 'form-control', 'id' => 'email']) !!}

          @if ($errors->has('author_email'))
            <span class="help-block">
              <strong>{{ $errors->first('author_email') }}</strong>
            </span>
          @endif
        </div>
        <div class="form-group">
          <label for="web">Website</label>
          {!! Form::text('author_url', null, ['class' => 'form-control', 'id' => 'web']) !!}
        </div>
        <div class="form-group required {{ $errors->has('body') ? 'has-error' : '' }}">
          <label for="comment">Comment <small class="text-danger">*</small></label>
          {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'comment', 'rows' => 5]) !!}

          @if ($errors->has('body'))
            <span class="help-block">
              <strong>{{ $errors->first('body') }}</strong>
            </span>
          @endif
        </div>
        <button type="submit" class="btn btn-lg btn-success">Submit</button>
        <i class="text-muted pull-right"><small class="text-danger">*</small> Indicates required fields</i>
        {!! Form::hidden('post_id', $post->id) !!}
      {!! Form::close() !!}
  </div><!-- Post Comment Closer -->

</div><!-- Comment Closer -->
