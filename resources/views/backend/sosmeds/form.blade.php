
<div class="col-xs-9">
  <!-- Default box -->
  <div class="box">

    <!-- box-body -->
    <div class="box-body">

      <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
        {!! Form::label('facebook') !!}
        {!! Form::text('facebook', null,  ['class' => 'form-control', 'id' => 'facebook']) !!}

        @if ($errors->has('facebook'))
          <span class="help-block">{{ $errors->first('facebook') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
        {!! Form::label('instagram') !!}
        {!! Form::text('instagram', null,  ['class' => 'form-control', 'id' => 'instagram']) !!}

        @if ($errors->has('instagram'))
          <span class="help-block">{{ $errors->first('instagram') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('github') ? 'has-error' : '' }}">
        {!! Form::label('github') !!}
        {!! Form::text('github', null,  ['class' => 'form-control', 'id' => 'github']) !!}

        @if ($errors->has('github'))
          <span class="help-block">{{ $errors->first('github') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
        {!! Form::label('twitter') !!}
        {!! Form::text('twitter', null,  ['class' => 'form-control', 'id' => 'twitter']) !!}

        @if ($errors->has('twitter'))
          <span class="help-block">{{ $errors->first('twitter') }}</span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('youtube') ? 'has-error' : '' }}">
        {!! Form::label('youtube') !!}
        {!! Form::text('youtube', null,  ['class' => 'form-control', 'id' => 'youtube']) !!}

        @if ($errors->has('youtube'))
          <span class="help-block">{{ $errors->first('youtube') }}</span>
        @endif
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
    </div>

  </div>
  <!-- /.box -->
</div>
