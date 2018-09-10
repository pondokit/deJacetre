
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

								<table class="visitortracker-table table table-sm table-striped fs-1">
									<thead>
										<th>Language</th>
										<th>Unique Visitors</th>
										<th>Visits</th>
										<th>Last Visit</th>
									</thead>

									<tbody>
										@foreach ($visits as $visit)
											<tr>
												<td>
													@if ($visit->browser_language_family)
						                  {{ strtoupper($visit->browser_language_family) }}
						                @else
						               		<span>Unknown</span>
						              @endif
												</td>

												<td>
													{{ $visit->visitors_count }}
												</td>

												<td>
													{{ $visit->visits_count }}
												</td>

												<td>
													@include('visitstats::_last_visit')
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
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
