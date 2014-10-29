@extends('layouts.master')

@section('content')
					@if( isset( $servers ) )
					<ul>
						@foreach( $servers as $server )
						@if( $server->serviceStatus() == 'down' )
						<li class="hardError">
							<a href="/server/view/{{ $server->id }}">{{ $server->hostname }}</a>
							<p>
								@foreach( $server->services()->get() as $service )
									{{ $service->statusIcon() }} {{ $service->name }}
								@endforeach
							</p>
						</li>
						@elseif( $server->serviceStatus() == 'unknown' )
						<li class="softError">
							<a href="/server/view/{{ $server->id }}">{{ $server->hostname }}</a>
							<p>
								@foreach( $server->services()->get() as $service )
								@if( $service->issuesUnconfirmed() )
								? {{ $service->name }}
								@endif
								@endforeach
							</p>
						</li>
						@else
						<li class="noError">
							<a href="/server/view/{{ $server->id }}">{{ $server->hostname }}</a>
						</li>
						@endif
						@endforeach
					
					</ul>

					@else

					No servers configured :(

					@endif
					
					<a class="reportLink" href="/report">Report an Issue</a>
@stop