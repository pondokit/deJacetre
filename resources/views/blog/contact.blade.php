@extends('layouts.main')

@section('home', 'active')

@section('content')

<!-- Slider / Carousel -->

<!-- Main -->
<div id="home" class="container">

	<!-- Content -->
	<div id="content" class="col-sm-8">
    <!-- Main -->
      <form class="contact-us" name="contactForm" action="contact-us-sent.html" method="post" onsubmit="return validateForm()" disabled>
        <ul>
          <li class="clearfix" style="margin-right:30px">
            <label for="input-name">Name</label>
            <input type="text" name="name" id="input-name" class="text-input" value="{{$contact->nama}}" disabled>
          </li>
          <li class="clearfix" style="margin-right:30px">
            <label for="input-phone">Phone Number</label>
            <input type="text" name="phone" id="input-phone" value="{{$contact->telepon	}}" class="text-input" placeholder="eg. (+32).81.81.37.00" disabled>
          </li>
          <li class="clearfix" style="margin-right:30px">
            <label for="input-email">Email</label>
            <input type="text" name="email" id="input-email" class="text-input" value="{{$contact->email}}" disabled>
          </li>
          <li class="clearfix" style="margin-right:30px">
            <label for="textarea-question">Alamat</label>
            <textarea name="question" rows="5" cols="40" id="textarea-question" class="text-input" disabled>{{$contact->alamat}}</textarea>
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Facebook</label>
            <input type="text" name="facebook" id="input-email" class="text-input" value="{{$contact->facebook}}" disabled>
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Instagram</label>
            <input type="text" name="instagram" id="input-email" class="text-input" value="{{$contact->instagram}}" disabled>
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">GitHub</label>
            <input type="text" name="github" id="input-email" class="text-input" value="{{$contact->github}}" disabled>
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Twitter</label>
            <input type="text" name="twitter" id="input-email" class="text-input" value="{{$contact->twitter}}" disabled>
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Youtube</label>
            <input type="text" name="youtube" id="input-email" class="text-input" value="{{$contact->youtube}}" disabled>
          </li>

					{{csrf_field()}}
          <!-- <li class="clearfix" style="margin-right:30px">
            <button type="submit" class="btn btn-submit">Submit</button>
          </li> -->
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
