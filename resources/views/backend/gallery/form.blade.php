
<div class="col-xs-9">
  <!-- Default box -->
  <div class="box">

    <!-- box-body -->
    <div class="box-body">

      <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('Image') !!}
        
        <div class="box-body text-left">
          <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                <img src="{{ ($gallery->image_thumb_url) ? $gallery->image_thumb_url : 'http://placehold.it/200x150&text=No+Image' }}" alt="...">
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
              <div>
                <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{!! Form::file('image') !!}</span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
              </div>
            </div>

            @if ($errors->has('image'))
              <span class="help-block">{{ $errors->first('image') }}</span>
            @endif
          </div>
        </div>
      </div>

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="save-btn">{{ $gallery->exists ? 'Update' : 'Save' }}</button>
      <a href="{{ route('gallery.index') }}" class="btn btn-default">Cancel</a>
    </div>

  </div>
  <!-- /.box -->
</div>
