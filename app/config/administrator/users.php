<?php

	return array(

		'title' =>		'Users',

		'single' => 	'user',

		'model' =>		'User',

		'columns' =>	array(

			'id',
			'username',
			'enabled' => array(
				'title' => 'Enabled',
				'select' => 'IF((:table).enabled, \'Yes\', \'No\')'
			)
		),

		'filter' => array(
			'id',
			'username'
		),

		'edit_fields' => array(
			'username' => array(
				'title' => 'Username',
				'type' => 'text',
			),
			'password' => array(
				'title' => 'Password',
				'type' => 'password'
			),
			'enabled' => array(
				'title' => 'Enabled',
				'type' => 'bool'
			)
		)
	);