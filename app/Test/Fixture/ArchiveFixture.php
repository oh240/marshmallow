<?php
/**
 * ArchiveFixture
 *
 */
class ArchiveFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'year' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'month' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'year' => 2014,
			'month' => 11,
			'count' => 1,
			'created' => '2014-11-12 09:22:10',
			'modified' => '2014-11-12 09:22:10'
		),
		array(
			'id' => 240,
			'year' => 2010,
			'month' => 8,
			'count' => 5,
			'created' => '2014-11-12 09:22:10',
			'modified' => '2014-11-12 09:22:10'
		),
	);

}
