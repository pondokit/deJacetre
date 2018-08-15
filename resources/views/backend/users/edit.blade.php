@extends('layouts.backend.main')

@section('title','Labaru | Edit User')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Users
      <small>Edit user</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('users.index') }}">Users</a></li>
      <li class="active">Edit User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($user, [
        'method'  => 'PUT',
        'route'   => ['users.update', $user->id],
        'files'   => TRUE,
        'id'      => 'user-form'
      ]) !!}

      @include('backend.users.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.users.script')