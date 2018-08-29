@extends('layouts.backend.main')

@section('title','Labaru | Roles')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Roles
      <small>Display all roles</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('roles.index') }}">Roles</a></li>
      <li class="active">All Roles</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

    	<!-- box-header -->
      <div class="box-header with-border clearfix">
        <div class="pull-left">
          <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
        </div>
        <div class="box-tools pull-right" style="padding: 7px 0;">

        </div>
      </div>
      <!-- /.box-header -->

      <!-- box-body -->
      <div class="box-body">
        @include('backend.partials.message')
        @include('backend.roles.table')
      </div>
      <!-- /.box-body -->

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
            $('#roles-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[1, 'asc']],
                ajax: '{!! route('roles.data') !!}',
                columns: [
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                    { data: 'title', name: 'title' },
                    { data: 'post_count', name: 'post_count' }
                ]
            });
        });
	</script>
@endsection
--}}
