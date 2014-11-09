<?php
class SimplerInitialMigrations extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'simpler_initial_migrations';

    public $records = [
        'Post' => [
          [
              'id' => 1,
              'title' => 'Hello World',
              'body' => 'この記事を編集して、Simplerを本格的に開始しましょう。',
              'published' => 1,
              'created' => '2014-11-04 21:13:00',
              'modified' => '2014-11-04 21:13:00',
          ]
        ],
        'Setting' => [
            [
                'id' => 1,
                'site_name' => 'Simpler Blog',
                'theme_name' => 'Sample Theme',
                'email' => 'exmaple@xxx.com'
            ],
        ]
    ];

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'imgs' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'size' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
					'original_width' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'original_height' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'posts' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'category_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false),
					'title' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'body' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'published' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'release_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'settings' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'site_name' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'theme_name' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'email' => array('type' => 'string', 'null' => true, 'length' => 500, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'users' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
					'email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'nickname' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'password' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'imgs', 'posts', 'settings', 'users'
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
        if ($direction === 'up') {
            foreach ($this->records as $model => $records) {
                if (!$this->updateRecords($model, $records)) {
                    return false;
                }
            }
        }
		return true;
	}

    /**
     * $recordsに設定されたレコードをTable作成成功後にDBに投入します。
     * @param $model
     * @param $records
     * @param null $scope
     * @return bool
     *
     */
    function updateRecords($model,$records,$scope = null) {
        $Model = $this->generateModel($model);
        foreach ($records as $record) {
            $Model->create();
            if (!$Model->save($record,false)) {
                return false;
            }
        }
        return true;
    }
}
