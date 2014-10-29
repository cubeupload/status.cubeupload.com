<?php

	return array(

		'title' =>		'Servers',

		'single' => 	'server',

		'model' =>		'Server',

		'columns' =>	array(
			'metric',
			'ip' => array(
				'title' => 'IP Address'
			),
			'hostname' => array(
				'title' => 'Hostname'
			),
			'description' => array(
				'title' => 'Description'
			),
			'services' => array(
				'title' => 'Services',
				'relationship' => 'services',
				'select' => 'GROUP_CONCAT((:table).friendly_name SEPARATOR \', \')'
			)
		),

		'filter' => array(
			'metric'
		),

		'edit_fields' => array(
			'metric' => array(
				'title' => 'Metric',
				'type' => 'number'
			),
			'ip' => array(
				'title' => 'IP Address',
				'type' => 'text',
			),
			'hostname' => array(
				'title' => 'Hostname',
				'type' => 'text'
			),
			'description' => array(
				'title' => 'Description',
				'type' => 'textarea'
			)
		)
	);