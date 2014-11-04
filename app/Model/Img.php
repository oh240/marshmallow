<?php
App::uses('AppModel', 'Model');
/**
 * Img Model
 *
 */
class Img extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();

	function getUniqueId()
	{
		return uniqid(rand());
	}
}
