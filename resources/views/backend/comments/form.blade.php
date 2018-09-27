
<div class="col-xs-9">
  <!-- Default box -->
  <div class="box">

    <!-- box-body -->
    <div class="box-body">

      <div class="form-group {{ $errors->has('author_name') ? 'has-error' : '' }}">
        {!! Form::label('Author Name') !!}
        {!! Form::text('author_name', null,  ['class' => 'form-control', 'id' => 'author_name']) !!}

        @if ($errors->has('author_name'))
          <span class="help-block">{{ $errors->first('author_name') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('author_email') ? 'has-error' : '' }}">
        {!! Form::label('Author Email') !!}
        {!! Form::text('author_email', null,  ['class' => 'form-control', 'id' => 'author_email']) !!}

        @if ($errors->has('author_email'))
          <span class="help-block">{{ $errors->first('author_email') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('author_url') ? 'has-error' : '' }}">
        {!! Form::label('Author Url') !!}
        {!! Form::text('author_url', null,  ['class' => 'form-control', 'id' => 'author_url']) !!}

        @if ($errors->has('author_url'))
          <span class="help-block">{{ $errors->first('author_url') }}</span>
        @endif
      </div>

      {!! Form::hidden('name', null,  ['class' => 'form-control', 'id' => 'name']) !!}

      <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        {!! Form::label('Comment') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '5']) !!}

        @if ($errors->has('body'))
          <span class="help-block">{{ $errors->first('body') }}</span>
        @endif
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="save-btn">Submit  </button>
      <a href="{{ route('comments.index') }}" class="btn btn-default">Cancel</a>
    </div>

  </div>
  <!-- /.box -->
</div>
