<?php
/**
 * ImgFixture
 *
 */
class ImgFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'original_width' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'original_height' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'crated' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'original_width' => 1,
			'original_height' => 1,
			'crated' => '2014-11-04 15:49:15',
			'modified' => '2014-11-04 15:49:15'
		),
	);

}
