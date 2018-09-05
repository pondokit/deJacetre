@extends('layouts.backend.main')

@section('title','Labaru | Visitor')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Visitor
      <small>Display all Visitor</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('categories.index') }}">Visitor</a></li>
      <li class="active">All Visitor</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box-body">
        @include('backend.visitor.index')
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('ul.pagination').addClass('pagination-sm no-margin');

    $(function() {
        $('#categories-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[1, 'asc']],
            ajax: '{!! route('categories.data') !!}',
            columns: [
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'post_count', name: 'post_count' }
            ]
        });
    });
	</script>
@endsection