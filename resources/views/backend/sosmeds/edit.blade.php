@extends('layouts.backend.main')

@section('title','Labaru | Manage Sosmed')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sosmed
      <small>Manage Sosmed</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('sosmeds.index') }}">Sosmeds</a></li>
      <li class="active">Manage Sosmed</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($sosmeds, [
        'method'  => 'PUT',
        'route'   => ['sosmeds.update', $sosmeds->id],
        'id'      => 'sosmeds-form'
      ]) !!}

      @include('backend.sosmeds.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.sosmeds.script')