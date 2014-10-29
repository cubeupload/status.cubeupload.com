@extends('layouts.master')

@section('content')
<div id="contactArea">
	
	<input type="text" id="name" placeholder="Name" required="">
	
	<input type="email" id="email" placeholder="Email Address" required="">
	
	<textarea id="message" placeholder="Your Message" required=""></textarea>

	<button type="submit">Send Message</button>

</div>
@stop

