<?php
App::uses('Archive', 'Model');

/**
 * Archive Test Case
 *
 */
class ArchiveTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.archive'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Archive = ClassRegistry::init('Archive');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Archive);

		parent::tearDown();
	}

	public function testGetCountId()
	{

		$expacted = 1;
		$testcase = strtotime('2014-11');
		$result = $this->Archive->getCountId($testcase);
		$this->assertEquals($expacted,$result['Archive']['id']);

		$expacted = 240;
		$testcase = strtotime('2010-08');
		$result = $this->Archive->getCountId($testcase);
		$this->assertEquals($expacted,$result['Archive']['id']);

		// No Archive
		$expacted = false;
		$testcase = strtotime('2014-12');
		$result = $this->Archive->getCountId($testcase);
		$this->assertEquals($expacted,$result);
	}


}
