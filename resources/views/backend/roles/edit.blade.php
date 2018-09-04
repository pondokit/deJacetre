@extends('layouts.backend.main')

@section('title','Labaru | Edit Role')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Roles
      <small>Edit role</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('roles.index') }}">Roles</a></li>
      <li class="active">Edit Role</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($role, [
        'method'  => 'PUT',
        'route'   => ['roles.update', $role->id],
        'id'      => 'role-form',
      ]) !!}

      @include('backend.roles.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection
