@extends('layouts.main')

@section('contact', 'active')

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
            {{$contact->nama}}
          </li>
          <li class="clearfix" style="margin-right:30px">
            <label for="input-phone">Phone Number</label>
            {{$contact->telepon	}}
          </li>
          <li class="clearfix" style="margin-right:30px">
            <label for="input-email">Email</label>
            {{$contact->email}}
          </li>
          <li class="clearfix" style="margin-right:30px">
            <label for="textarea-question">Alamat</label>
            {{$contact->alamat}}
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Facebook</label>
            {{$contact->facebook}}
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Instagram</label>
          {{$contact->instagram}}
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">GitHub</label>
            {{$contact->github}}
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Twitter</label>
          	{{$contact->twitter}}
          </li>
					<li class="clearfix" style="margin-right:30px">
            <label for="input-email">Youtube</label>
          {{$contact->youtube}}
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
