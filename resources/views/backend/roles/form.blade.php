
<div class="col-xs-9">
  <!-- Default box -->
  <div class="box">

    <!-- box-body -->
    <div class="box-body">

      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}

        @if ($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
      </div>
      <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
        {!! Form::label('permissions') !!}

        {!! Form::select('permissions', App\Permission::pluck('name','id'), $role->exists ? $permission_id : null, ['name' => 'permissions[]', 'class' => 'form-control select2', 'multiple' => 'multiple', 'style' => 'cursor:pointer;']) !!}

        @if ($errors->has('permissions'))
          <span class="help-block">{{ $errors->first('permissions') }}</span>
        @endif
      </div>
      <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        {!! Form::label('description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) !!}

        @if ($errors->has('description'))
          <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="save-btn">{{ $role->exists ? 'Update' : 'Save' }}</button>
      <a href="{{ route('roles.index') }}" class="btn btn-default">Cancel</a>
    </div>

  </div>
  <!-- /.box -->
</div>

@include('backend.roles.script')
