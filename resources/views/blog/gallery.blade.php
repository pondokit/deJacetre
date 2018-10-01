@extends('layouts.main')

@section('gallery', 'active')

@section('style')

<style>
	.gambar {
		height: 250px;
	}
</style>

@endsection

@section('content')
<div class="container" style="padding: 0">
	<div class="row clearfix" style="padding-bottom: 10px;">
		@foreach($gallery as $g)
			<div class="col-md-4">
			        <a href="/AbidBlog/img/{{ $g->image }}" target="_blank">
			          <img src="/AbidBlog/img/{{ $g->image }}" class="img-rounded" alt="{{ $g->image }}" style="width: 100%;">
			        </a>
			</div>
		@endforeach
	</div>
</div>
@endsection 