<?php
class CreateCategoriesTable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'create_categories_table';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'archives' => array(
					'count' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
				),
			),
			'create_table' => array(
				'categories' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'archives' => array(
					'count' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
				),
			),
			'drop_table' => array(
				'categories'
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
