<?php

	return array(

		'title' =>		'Services',

		'single' => 	'service',

		'model' =>		'Service',

		'columns' =>	array(
			'server' => array(
				'title' => 'Server',
				'relationship' => 'server',
				'select' => '(:table).hostname'
			),
			'friendly_name' => array(
				'title' => 'Friendly Name'
			),
			'description',
			'status',

		),

		'filter' => array(
			'id',
			'name'
		),

		'edit_fields' => array(
			'name' => array(
				'title' => 'Name',
				'type' => 'text'
			),
			'friendly_name' => array(
				'title' => 'Friendly Name',
				'type' => 'text'
			),
			'description' => array(
				'title' => 'Description',
				'type' => 'textarea'
			),
			'status' => array(
				'title' => 'Status',
				'type' => 'enum',
				'options' => array(
					'up' => 'Up',
					'down' => 'Down',
					'unknown' => 'Unknown'
				)
			),
			'server' => array(
				'title' => 'Server',
				'type' => 'relationship',
				'name_field' => 'hostname'
			)
		)
	);