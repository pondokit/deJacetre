@extends('layouts.backend.main')

@section('title','Labaru | About Page')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      About
      <small>Edit Description about yourself</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('about.index') }}">About</a></li>
      <li class="active">Description below</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($about, [
        'method'  => 'PUT',
        'route'   => ['about.update', $about->id],
        'id'      => 'about-form'
      ]) !!}

      @include('backend.about.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection