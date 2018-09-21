
<div class="col-xs-9">
  <!-- Default box -->
  <div class="box">

    <!-- box-body -->
    <div class="box-body">

      <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
        {!! Form::label('name') !!}
        {!! Form::text('display_name', null,  ['class' => 'form-control', 'id' => 'display_name']) !!}

        @if ($errors->has('display_name'))
          <span class="help-block">{{ $errors->first('display_name') }}</span>
        @endif
      </div>

      {!! Form::hidden('name', null,  ['class' => 'form-control', 'id' => 'name']) !!}

      <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        {!! Form::label('description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}

        @if ($errors->has('description'))
          <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
      </div>
    </div>

  </div>
  <!-- /.box -->
</div>
