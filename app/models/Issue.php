<?php

	class Issue extends Eloquent
	{
		public function services()
		{
			return $this->belongsToMany('Service');
		}
	}
