@extends('layouts.backend.main')

@section('title','Labaru | Blog Index')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blog
      <small>Display all blog posts</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('blog.index') }}">Blog</a></li>
      <li class="active">All Posts</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">

    	<!-- box-header -->
      <div class="box-header with-border clearfix">
        <div class="pull-left">
          <a href="{{ route('blog.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
        </div>
        <div class="box-tools pull-right" style="padding: 7px 0;">
          <?php $links = [] ?>
          @foreach($statusList as $key => $value)
            @if($value)
              <?php $selected = Request::get('status') == $key ? 'selected-status' : ''; ?>
              <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">".ucwords($key)." ({$value})</a>" ?>
            @endif
          @endforeach
          {!! implode(' | ', $links) !!}

          <!-- //// Tombol Close & Minimize //// -->
          <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button> -->
          
        </div>
      </div>
      <!-- /.box-header -->

      <!-- box-body -->
      <div class="box-body">
        @include('backend.partials.message')

        @if ($onlyTrashed == TRUE)
          @include('backend.blog.table-trash')
        @else
          @include('backend.blog.table')
        @endif
      </div>
      <!-- /.box-body -->

    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('ul.pagination').addClass('pagination-sm no-margin');

    $(function() {
        $('#posts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('blog.data') !!}',
            columns: [
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'author', name: 'author' },
                { data: 'category', name: 'category' },
                { data: 'label', name: 'label' },
            ]
        });
    });
	</script>
@endsection