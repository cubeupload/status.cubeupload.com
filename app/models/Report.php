<?php

	class Report extends Eloquent
	{
		protected $fillable = array( 'name', 'email', 'message' );
		public function notifyAdmins()
		{
			Mail::send('emails.report', $this->toArray(), function( $msg )
			{
				$admins = User::whereEnabled(true)->lists('email');
				$msg->setTo( $admins );
				$msg->setFrom('reports@cubeupload.com');
			});
		}
	}