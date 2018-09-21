@extends('layouts.backend.main')

@section('title','Labaru | Edit Comments')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Permissions
      <small>Edit Comment</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('comments.index') }}">Permissions</a></li>
      <li class="active">Edit Comment</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($comments, [
        'method'  => 'PUT',
        'route'   => ['comments.update', $comments->id],
        'files'   => TRUE,
        'id'      => 'comment-form'
      ]) !!}

      @include('backend.comments.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.permissions.script')
