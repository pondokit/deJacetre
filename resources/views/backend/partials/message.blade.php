@if (session('message'))
  <div class="alert alert-info">
    <strong>{{ session('message') }}</strong>
  </div>
@elseif (session('error-message'))
	<div class="alert alert-danger">
    <strong>{{ session('error-message') }}</strong>
  </div>
@elseif (session('trash-message'))
	<?php list($message, $postId) = session('trash-message'); ?>
	{!! Form::open(['method' => 'PUT', 'route' => ['blog.restore', $postId]]) !!}
		<div class="alert alert-info">
			<strong>{{ $message }}</strong>
			<button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-undo"></i> Undo</button">
		</div>
	{!! Form::close() !!}
@endif