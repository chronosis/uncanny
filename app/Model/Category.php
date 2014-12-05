<?php
App::uses('AppModel', 'Model');
/**
 * Catagory Model
 *
 * @property Response $responses
 */
class Category extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'label';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Response' => array(
			'className' => 'Response',
			'foreignKey' => 'category_id',
			'order' => array('Response.id' => 'ASC'),
			'dependent' => false
		)
	);

}
