@extends('layouts.master')

@section('content')
<div id="contactArea">
	<form action="/login" method="POST">
	<input type="text" id="username" name="username" placeholder="Username" required="">
	
	<input type="password" id="password" name="password" placeholder="Password" required="">
	
	<label for="remember_me">Remember Me</label>
	<input type="checkbox" id="remember_me" name="remember_me">

	<button type="submit">Login</button>
	</form>

</div>

@if( isset( $errors ) && is_array( $errors ) )
	Login errors:
	<ul>
	@foreach( $errors as $error )
		<li>{{ $error }}</li>
	@endforeach
	</ul>
@endif

@stop

