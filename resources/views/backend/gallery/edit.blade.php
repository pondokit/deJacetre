@extends('layouts.backend.main')

@section('title','Labaru | Edit Gallery')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gallery
      <small>Edit Gallaery</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('gallery.index') }}">Gallery</a></li>
      <li class="active">Edit Gallery</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($gallery, [
        'method'  => 'PUT',
        'route'   => ['gallery.update', $gallery->id],
        'files'   => TRUE,
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