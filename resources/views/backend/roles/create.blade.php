@extends('layouts.backend.main')

@section('title','Labaru | Add New Category')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Roles
      <small>Create new role</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('roles.index') }}">Roles</a></li>
      <li class="active">Add New</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($role, [
        'method'  => 'POST',
        'route'   => 'roles.store',
        'id'      => 'role-form'
      ]) !!}

      @include('backend.roles.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection
