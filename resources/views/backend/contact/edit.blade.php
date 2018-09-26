@extends('layouts.backend.main')

@section('title','Labaru | Manage Contact')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Contact
      <small>Manage Sosmed</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('contact.index') }}">Contact</a></li>
      <li class="active">Manage Contact</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      {!! Form::model($contact, [
        'method'  => 'PUT',
        'route'   => ['contact.update', $contact->id],
        'id'      => 'contact-form'
      ]) !!}

      @include('backend.contact.form')

      {!! Form::close() !!}

    </div>

  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.contact.script')
