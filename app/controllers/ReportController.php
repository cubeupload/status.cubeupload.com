<?php

	class ReportController extends BaseController
	{
		public function getIndex()
		{
			return View::make('forms.report');
		}
	}