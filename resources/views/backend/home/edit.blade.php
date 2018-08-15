@extends('layouts.backend.main')

@section('title','Labaru | Edit Account')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Account
      <small>Edit account</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Edit Account</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-sm-9">
        @include('backend.partials.message')
      </div>

      {!! Form::model($user, [
        'method'  => 'PUT',
        'url'     => '/edit-account',
        'id'      => 'user-form'
      ]) !!}

      @include('backend.users.form', ['hideRoleDropdown' => 'true'])

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.users.script')