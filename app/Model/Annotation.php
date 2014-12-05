<?php
App::uses('AppModel', 'Model');
/**
 * Annotation Model
 *
 * @property Response $Response
 */
class Annotation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'label';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Response' => array(
			'className' => 'Response',
			'foreignKey' => 'response_id'
		)
	);
}
