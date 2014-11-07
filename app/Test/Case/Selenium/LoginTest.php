<?php

class LoginTest extends PHPUnit_Extensions_SeleniumTestCase
{

    protected function setUp()
    {
        $this->setHost("127.0.0.1");
        $this->setPort(4444);
        $this->setBrowser("firefox");
        $this->setBrowserUrl("http://127.0.0.1/");
    }

    public function testMyTestCase()
    {
        $this->open("/");
        $this->click("link=ログインする");
        $this->waitForPageToLoad("30000");
        $this->type("id=UserNickname", "admin");
        $this->type("id=UserPassword", "admin");
        $this->click("//input[@value='ログイン']");
        $this->waitForPageToLoad("30000");
    }
}