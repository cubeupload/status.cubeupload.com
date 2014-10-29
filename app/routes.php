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
		$remember = true;

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

Route::controller('service', 'ServiceController');
Route::controller('server', 'ServerController');
Route::controller('issue', 'IssueController');
Route::controller('report', 'ReportController');