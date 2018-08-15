@extends('layouts.main')

@section('style')
	<style type="text/css">
		#footer {
			position: fixed;
			bottom: 0;
			width: 100%;
			z-index: 10;
		}
	</style>
@endsection

@section('content')
    
  <div class="panel panel-default">
    <div class="panel-body text-center jumbotron" style="background: none; padding: 50px 0;">
        <h1>Page Not Found</h1>
        <p>Sorry, the page you are looking for could not be found.</p>
    </div>
  </div>

@endsection