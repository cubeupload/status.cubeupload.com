<?php

	class ServiceController extends BaseController
	{
		public function getView( $id = -1 )
		{
			$service = Service::find($id);
			if( $service )
			{
				return View::make('service')->with( array( 'service' => $service ) );
			}
		}
	}

