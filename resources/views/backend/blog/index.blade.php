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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</button>
          @if (session('author') !== null || session('category') !== null)
            <b> = </b>
            <button class="btn btn-default disabled">
              {!! session('author') !== null ? '<b class="filtered1">Author: </b>'.$author->namef(session('author')) : null !!}
              {!! session('category') !== null ? '<b class="filtered2">Category: </b>'.$category->namef(session('category')) : null !!}
            </button>
            <a href="?status=all" class="btn btn-default filterless">Disable Filter</a>
          @endif
        </div>
        <div class="box-tools pull-right" style="padding: 7px 0;">
          <?php $links = [] ?>
          @foreach($statusList as $key => $value)
            @if($value)
              <?php $selected = Request::get('status') == $key ? 'selected-status' : ''; ?>
              <?php 
                if (isset($_GET['author']) || isset($_GET['category'])) {

                  $category = isset($_GET['category']) ? $_GET['category'] : '';
                  $author = isset($_GET['author']) ? $_GET['author'] : '';

                  if (empty($author)) {
                    $href = "?category={$category}&status={$key}";
                  } else if (empty($category)) {
                    $href = "?author={$author}&status={$key}";
                  } else {
                    $href = "?category={$category}&author={$author}&status={$key}";
                  }
                } else {
                  $href = "?status={$key}"; 
                } 
                $links[] = "<a class='{$selected}' href='{$href}'>".ucwords($key)." ({$value})</a>" 
                ?>
            @endif
          @endforeach
          {!! implode(' | ', $links) !!}
        </div>
      </div>
      <!-- /.box-header -->

      <!-- Modal -->
      <div id="filter" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <form action="" method="get">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Filter Search</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  {!! Form::label('author') !!}
                  {!! Form::select('author', $author_data, (($author_id = session('author')) ? $author_id : null), ['class' => 'form-control select2 filter1', 'style' => 'cursor:pointer;']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('category') !!}
                  {!! Form::select('category', $category_data, (($category_id = session('category')) ? $category_id : null), ['class' => 'form-control select2 filter2', 'style' => 'cursor:pointer;']) !!}
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>

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
            order: [[1, 'asc']],
            ajax: '{!! route('blog.data') !!}',
            columns: [
                { data: 'action', name: 'action', orderable: false, searchable: false },
                { data: 'title', name: 'title' },
                { data: 'author', name: 'author', orderable: false, searchable: false },
                { data: 'category', name: 'category', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'label', name: 'label', orderable: false, searchable: false },
                { data: 'view_count', name: 'view_count' },
            ]
        });
    });

    // Filter Function
    $('#filter select').css('width', '100%');
    $('.select2').select2({
      placeholder: "Choose a filter",
      allowClear: true
    });
    $('.select2-container .select2-selection--single').css('height', 'auto');

    $(document).ready(function(){
      if ($('b').hasClass('filtered1') && $('b').hasClass('filtered2')) {

      }
      else if ($('b').hasClass('filtered1')) {
        $('.filter2').val(null).trigger('change');
      }
      else if ($('b').hasClass('filtered2')) {
        $('.filter1').val(null).trigger('change');
      }
      else {
        $('.select2').val(null).trigger('change');
      }
    });

	</script>
@endsection
