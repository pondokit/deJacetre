@extends('visitstats::layout')

@section('visitortracker_content')
<div class="content-wrapper">
	<section class="content-header">
	    <h1>
	      Visitor
	      <small>Display all Visitor</small>
	    </h1>
  	</section>
  	<section class="content">
  		<div class="box">
      		<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<h5>{{ $visitortrackerSubtitle }}</h5>

						@include('visitstats::_table_requests')

						<div class="pull-right">
							{{ $visits->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection