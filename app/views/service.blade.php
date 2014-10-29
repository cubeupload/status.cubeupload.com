@extends('layouts.master')
@section('content')
<br />
<ul>
	<li>
		{{ $service->name }}
	</li>
	@foreach( $service->issues()->get() as $issue )
		@if( $issue->active )
		<li class="issueLine issueActive">
			{{ $issue->title }}<br />
			{{ $issue->description }}
		</li>
		@else
		<li class="issueLine issueInactive">
			{{ $issue->title }}
		</li>
		@endif
	@endforeach
</ul>
@stop