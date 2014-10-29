<?php

	class ReportController extends BaseController
	{
		public function getIndex()
		{
			return View::make('forms.report');
		}

		public function postIndex()
		{
			$fields = Input::all();

			$rules = array(
				'name' => 'required',
				'email' => 'email',
				'message' => 'required'
			);

			$v = Validator::make( $fields, $rules );

			if( $v->fails() )
				return View::make('forms.report')->with(array('error' => $v->errors()->all()));
			else
			{
				$report = new Report( $fields );
				$report->save();
				$report->notifyAdmins();

				return View::make('forms.report')->with(array('submitted' => true));
			}
		}
	}