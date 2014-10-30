<?php

	class Server extends Eloquent
	{
		private $currentStatus;
		
		public function services()
		{
			return $this->hasMany('Service');
		}
		
		public function serviceStatus()
		{
			if( $this->currentStatus == null )
			{
				$status = 'up';
				
				foreach( $this->services()->get() as $service )
				{
					if( $service->status == 'down')
					{
						$status = 'down';
						continue;
					}
					elseif( $service->status == 'unknown')
					{
						$status == 'unknown';
						continue;
					}
				}
				$this->currentStatus = $status;
				return $status;
			}
			else
			{
				return $this->currentStatus;
			}
		}

		public function generateAuthKey()
		{
			$this->authKey = str_random(16);
		}
		
	}