@extends('layouts.backend.main')

@section('title','Labaru | Details Comments')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Comment
      <small>Detail Comment</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('comments.index') }}">Comments</a></li>
      <li class="active">Details Comment</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-xs-9">


        <div class="box">
          <div class="box-body">

            <div class="form-group">
              <label for="Author Name">Author Name : </label>
              {{$comments->author_name}}
            </div>
            <div class="form-group">
              <label for="Author Name">Author Email : </label>
              {{$comments->author_email}}
            </div>
            <div class="form-group">
              <label for="Author Name">Comment :</label>

              <p>{{$comments->body}}</p>
            </div>
            <div class="form-group">
              <label for="Author Name">Author Web : </label>
              {{$comments->author_url}}
            </div>
            <div class="form-group">
              <label for="Author Name">Comment on (Post Title) : </label>
              {{$comments->post->title}}
            </div>
            <div class="form-group">
              <label for="Author Name">Created at : </label>
              {{$comments->created_at}}
            </div>

        </div>

        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection

@include('backend.permissions.script')
