<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$servers = Server::all()->sortBy(function($server) { return $server->metric; });
	return View::make('status')->with( array( 'servers' => $servers ) );
});

Route::get('/login', function()
{
	return View::make('forms.login');
});

Route::post('/login', function()
{
	$remember = false;
	$input = Input::all();

	$input['enabled'] = 1; // Extra auth condition - user must be enabled.

	$rules = array(
		'username' => 'required|exists:users',
		'password' => 'required'
	);

	if( array_key_exists( 'remember_me', $input ) )
	{
		$remember = true;
		unset( $input['remember_me'] );
	}

	$v = Validator::make( $input, $rules );

	if( $v->fails())
		return View::make('forms.login')->with( array( 'errors' => $v->errors()->all() ));
	else
	{
		if( Auth::attempt($input, $remember) )
			return Redirect::intended('/');
		else
			return View::make('forms.login')->with( array( 'errors' => array('Username/password combination not found.')));
	}
});

Route::get('logout', function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::post('heartbeat', function()
{
	$input = Input::all();

	$rules = array(
		'id' => 'required|exists:servers',
		'status' => 'required',
		'key' => 'required'
	);

	$v = Validator::make($input, $rules);

	if( $v->fails() )
	{
		return Response::json( array('error' => $v->errors()->all() ) );
	}

	// server existence checked above in the validator.
	$server = Server::whereId( $input['id'] )->first();

	if( $server->authKey != $input['key'] )
		return Response::json( array('error' => 'Invalid auth key'));

	$status = json_decode( $input['status'], true );

	$currentServices = $server->services()->get();
	//dd( $status );
	foreach( $currentServices as $service )
	{
		if( array_key_exists( 'up', $status ) && in_array( $service->name, $status['up']) )
			$service->status = 'up';
		if( array_key_exists( 'down', $status ) && in_array( $service->name, $status['down'] ) )
			$service->status = 'down';
		if( array_key_exists( 'unknown', $status ) &&  in_array( $service->name, $status['unknown'] ) )
			$service->status = 'unknown';

		$service->save();
	}

	return $server->services()->get();

});

Route::controller('service', 'ServiceController');
Route::controller('server', 'ServerController');
Route::controller('issue', 'IssueController');
Route::controller('report', 'ReportController');