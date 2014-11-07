<?php
class CreateColumDisqusUserId extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'create_colum_disqus_user_id';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'imgs' => array(
					'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
				'settings' => array(
					'site_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'theme_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
			),
			'create_field' => array(
				'settings' => array(
					'disqus_user_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8', 'after' => 'email'),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'imgs' => array(
					'name' => array('type' => 'string', 'null' => false, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
				'settings' => array(
					'site_name' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'theme_name' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'email' => array('type' => 'string', 'null' => true, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
				),
			),
			'drop_field' => array(
				'settings' => array('disqus_user_id'),
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
