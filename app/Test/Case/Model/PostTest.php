<?php
App::uses('Post', 'Model');

/**
 * Post Test Case
 *
 */
class PostTest extends CakeTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.post',
    );

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Post = ClassRegistry::init('Post');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Post);

        parent::tearDown();
    }

    public function testDateTrimSymbole()
    {

        $expacted = '201411';
        $testcase = '201411';

        $result = $this->Post->dateTrimSymbole($testcase);

        $this->assertEquals($expacted,$result);

        $expacted = '201410';
        $testcase = '2014/10';

        $result = $this->Post->dateTrimSymbole($testcase);

        $this->assertEquals($expacted,$result);

        $expacted = '201111';
        $testcase = '2011-11';

        $result = $this->Post->dateTrimSymbole($testcase);

        $this->assertEquals($expacted,$result);
    }

	function testcountDataPosts()
	{
		$expacted = 3;

		$testcase = [
			'Archive' => [
				'year' => '2014',
				'month' => '11'
			]
		];

		$result = $this->Post->countDatePosts($testcase);
		$this->assertEquals($expacted,$result);

		$expacted = 1;

		$testcase = [
			'Archive' => [
				'year' => '2013',
				'month' => '02'
			]
		];

		$result = $this->Post->countDatePosts($testcase);
		$this->assertEquals($expacted,$result);


		$expacted = 0;
		// 削除されているfixtureを参照しているのでヒットがありません
        $testcase = [
            'Archive' => [
                'year' => '2014',
                'month' => '07'
            ]
        ];

		$result = $this->Post->countDatePosts($testcase);
		$this->assertEquals($expacted,$result);

	}

    public function testReturnFilterType()
    {
        $expaced = true;
        $testcase = 'public';
        $result = $this->Post->returnFilterType($testcase);

        $this->assertEquals($expaced,$result);

        $expaced = false;
        $testcase = 'draft';
        $result = $this->Post->returnFilterType($testcase);

        $this->assertEquals($expaced,$result);

    }

}
