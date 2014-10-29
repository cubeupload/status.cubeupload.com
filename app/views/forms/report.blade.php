@extends('layouts.master')

@section('content')
<div id="contactArea">
	<form action="/report" method="POST">
		<input type="text" id="name" name="name" placeholder="Name" required="">
		
		<input type="email" id="email" name="email" placeholder="Email Address">
		
		<textarea id="message" name="message" placeholder="Your Message" required=""></textarea>

		<button type="submit">Send Message</button>
	</form>

	@if( isset( $submitted ) )
		<p>Thanks, your report has been submitted and admins notified!</p>
	@endif
</div>
@stop

