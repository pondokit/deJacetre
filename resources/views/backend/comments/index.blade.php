@extends('layouts.backend.main')

@section('title','Labaru | Comments')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Comments
      <small>Display all comments</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('comments.index') }}">Comments</a></li>
      <li class="active">All Comments</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

    	<!-- box-header -->
      <div class="box-header with-border clearfix">
        <div class="box-tools pull-right" style="padding: 7px 0;">

        </div>
      </div>
      <!-- /.box-header -->

      <!-- box-body -->

      <!-- if(!empty()){ -->

        <div class="box-body">
          @include('backend.partials.message')
          @include('backend.comments.table')
        </div>

      <!-- /.box-body -->
      {{ $comments->links() }}
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
@endsection






{{--
@section('script')
	<script type="text/javascript">
		$('ul.pagination').addClass('pagination-sm no-margin');

    $(function() {
        $('#comments-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[1, 'asc']],
            ajax: '{!! route('categories.data') !!}',
            columns: [
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'Visitor Name', name: 'title' },
                { data: 'post_count', name: 'post_count' }
            ]
        });
    });
	</script>
@endsection
--}}
