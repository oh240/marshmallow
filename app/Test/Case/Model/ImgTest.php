<?php
App::uses('Img', 'Model');

/**
 * Img Test Case
 *
 */
class ImgTest extends CakeTestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Img = ClassRegistry::init('Img');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Img);
        parent::tearDown();
    }

    public function testGetMimeType()
    {
        $expacted = '.png';
        $file_type = 'image/png';
        $result = $this->Img->getMimeType($file_type);

        $this->assertEquals($expacted,$result);

        $expacted = '.jpg';
        $file_type = 'image/jpeg';
        $result = $this->Img->getMimeType($file_type);

        $this->assertEquals($expacted,$result);

        $expacted = '.gif';
        $file_type = 'image/gif';
        $result = $this->Img->getMimeType($file_type);

        $this->assertEquals($expacted,$result);


    }

}
