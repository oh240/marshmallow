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

	function getMimeType($file_type)
	{
		$type = [
			'image/png' => '.png',
			'image/jpeg' => '.jpg',
			'image/gif' => '.gif',
		];
		return $type[$file_type];
	}
}
