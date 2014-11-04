<?php
App::uses('Img', 'Model');

/**
 * Img Test Case
 *
 */
class ImgTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.img'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Img = ClassRegistry::init('Img');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Img);

		parent::tearDown();
	}

}
