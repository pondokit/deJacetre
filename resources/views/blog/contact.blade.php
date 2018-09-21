@extends('layouts.main')

@section('home', 'active')

@section('content')

<!-- Slider / Carousel -->

<!-- Main -->
<div id="home" class="container">

	<!-- Content -->
	<div id="content" class="col-sm-8">

    <!-- Main -->

            <form class="contact-us" name="contactForm" action="contact-us-sent.html" method="post" onsubmit="return validateForm()">
              <ul>
                <li class="clearfix" style="margin-right:30px">
                  <label for="input-name"><span>*</span>Your Name</label>
                  <input type="text" name="name" id="input-name" class="text-input">
                </li>
                <li class="clearfix" style="margin-right:30px">
                  <label for="input-phone">Phone Number</label>
                  <input type="text" name="phone" id="input-phone" class="text-input" placeholder="eg. (+32).81.81.37.00">
                </li>
                <li class="clearfix" style="margin-right:30px">
                  <label for="input-email"><span>*</span>Email</label>
                  <input type="text" name="email" id="input-email" class="text-input">
                </li>
                <li class="clearfix" style="margin-right:30px">
                  <label for="input-company">Your Company</label>
                  <input type="text" name="company" id="input-company" class="text-input">
                </li>
                <li class="clearfix" style="margin-right:30px">
                  <label for="input-subject">Subject</label>
                  <input type="text" name="subject" id="input-subject" class="text-input">
                </li>
                <li class="clearfix" style="margin-right:30px">
                  <label for="textarea-question"><span>*</span>Your Question</label>
                  <textarea name="question" rows="5" cols="40" id="textarea-question" class="text-input"></textarea>
                </li>
                <li class="clearfix" style="margin-right:30px">
                  <button type="submit" class="btn btn-submit">Submit</button>
                </li>
              </ul>
            </form>

	</div><!-- Content Closer -->

  <!-- Sidebar -->
	@include('layouts.sidebar')

	<!-- Sidebar Closer -->

</div><!-- Main Closer -->

@endsection

@section('script')
<script type="text/javascript">

  $('document').ready(function(){
    $('.queue-0').addClass('active');
  });

</script>
@endsection
