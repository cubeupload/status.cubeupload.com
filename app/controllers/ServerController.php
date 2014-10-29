<?php

	class ServerController extends BaseController
	{
		public function getView($id)
		{
			$server = Server::find( $id );

			if( $server == null )
				return View::make('server')->with(array('error' => 'Server not found'));

			return View::make('server')->with(array('server' => $server ));
		}
	}