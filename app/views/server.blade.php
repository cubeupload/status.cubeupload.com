@extends('layouts.master')

@section('content')
					@if( isset( $server ) )
					<h1>{{ $server->hostname }}</h1>
					<i>{{ $server->description }}</i>
					<ul>
						@foreach( $server->services()->get() as $service )
							<li>{{ $service->statusIcon() }} {{ $service->name }}</li>
						@endforeach
					</ul>

					@else

					{{ $error }}

					@endif
@stop