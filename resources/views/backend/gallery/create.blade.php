@extends('layouts.backend.main')

@section('title','Labaru | Add New Gallery')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gallery
      <small>Create new Gallery</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
      <li class="active">Add New</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($gallery, [
        'method'  => 'POST',
        'files'   => TRUE,
        'route'   => 'gallery.store',
        'id'      => 'gallery-form'
      ]) !!}

      @include('backend.gallery.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.gallery.script')