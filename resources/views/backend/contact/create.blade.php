@extends('layouts.backend.main')

@section('title','Labaru | Add New Permission')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Permissions
      <small>Create new permission</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('permissions.index') }}">Permissions</a></li>
      <li class="active">Add New</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($permission, [
        'method'  => 'POST',
        'route'   => 'permissions.store',
        'id'      => 'permission-form'
      ]) !!}

      @include('backend.permissions.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.permissions.script')