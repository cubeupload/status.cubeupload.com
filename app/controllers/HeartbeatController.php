<?php

	public function postIndex()
	{
		$input = Input::all();

		$rules = array(
			'id' => 'required|exists:servers',
			'status' => 'required'
		);

		$v = Validator::make($rules, $input);

		if( $v->fails() )
		{
			return Response::json( array('error' => $v->errors()->all() ) );
		}

		// server existence checked above in the validator.
		$server = Server::whereKey( $input['id'] );

		$services = array('up'=>array(), 'down' => array(), 'unknown' => array());

		foreach( $server->services()->all() as $service )
		{
			if( in_array( $service->name, $input['up'] ) )
				$services['up'][] = $input['up'];
			elseif( in_array( $service->name, $input['down']))
				$services['down'][] = $input['down'];
			elseif( in_array( $service->name, $input['unknown']))
				$services['unknown'][] = $input['unknown'];
		}

		// compare expected services in 'up' vs the $services->all()->toArray();
	}