<?php
App::uses('AppModel', 'Model');
/**
 * Response Model
 *
 */
class Response extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'label';

	/**
	* belongsTo associations
	*
	* @var array
	*/
		public $belongsTo = array(
			'Category' => array(
				'className' => 'Category',
				'foreignKey' => 'category_id'
			)
		);

	/**
	* hasMany associations
	*
	* @var array
	*/
	public $hasMany = array(
		'Annotation' => array(
			'className' => 'Annotation',
			'foreignKey' => 'response_id',
			'order' => array('Annotation.id' => 'ASC'),
			'dependent' => true
		)
	);



}
