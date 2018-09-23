
<div class="col-xs-9">
  <!-- Default box -->
  <div class="box">

    <!-- box-body -->
    <div class="box-body">

      <div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
        {!! Form::label('about') !!}
        {!! Form::textarea('about', null, ['class' => 'form-control', 'rows' => '5']) !!}

        @if ($errors->has('about'))
          <span class="help-block">{{ $errors->first('about') }}</span>
        @endif
      </div>
    </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary pull-right" id="save-btn">Save</button>
    </div>

  </div>
  <!-- /.box -->
</div>
